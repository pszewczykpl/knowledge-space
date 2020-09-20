<?php

namespace App\Http\Controllers\API;

use App\Investment;
use App\Fund;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class InvestmentFundsController extends Controller
{

    /**
     * Display a listing of the resource for datatables.net plugin
     * 
     * @param integer App\Investment
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables($id, Request $request)
    {
        $records = Investment::findOrFail($id)->funds()
        
        ->where('status', 'A')

        ->where(function ($query) {
            foreach($_POST['columns'] as $column) {
                if($column['searchable'] == 'true' && $column['search']['value'] != null) {
                    $query->where($column['data'], 'like', '%' . trim($column['search']['value']) . '%');
                }
            }
        })

        ->orderBy($_POST['columns'][$_POST['order'][0]['column']]['data'], $_POST['order'][0]['dir']);

        $filtered = $records->count();

        $records = $records
        ->limit($_POST['length'])
        ->offset($_POST['start'])
        ->get();

        $json_data = array(
            "draw"            => intval($_POST['draw']),
            "recordsTotal"    => Investment::findOrFail($id)->funds()->where('status', 'A')->count(),
            "recordsFiltered" => $filtered,
            "data"            => $records
        );

        return $json_data;
    }
}
