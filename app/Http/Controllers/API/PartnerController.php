<?php

namespace App\Http\Controllers\API;

use App\Models\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource for datatables.net plugin
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request)
    {
        $records = Partner::select('*')
        
        ->where(function ($query) {
            if($_POST['search']['value'] != null) {
                foreach($_POST['columns'] as $column) {
                    if($column['searchable'] == 'true') {
                        if(!isset($i)) {
                            $query->where($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                            $i = 1;
                        }
                        else {
                            $query->orWhere($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                        }
                    }
                }
            }
        })

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
            "recordsTotal"    => Partner::count(),
            "recordsFiltered" => $filtered,
            "data"            => $records
        );

        return $json_data;
    }
}
