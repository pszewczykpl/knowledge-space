<?php

namespace App\Http\Controllers\API;

use App\Models\Investment;
use App\Models\Fund;
use App\Models\File;
use App\Models\FileCategory;

use ZipArchive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class InvestmentsController extends Controller
{
    /**
     * Display a listing of the resource for datatables.net plugin
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request)
    {
        $records = Investment::select('name', 'code_toil', 'code', 'edit_date', 'status', 'id', 'dist', 'dist_short', 'code_owu', 'group', 'type')
        
        ->where(function ($query) {
            if($_POST['search']['value'] != null) {
                foreach($_POST['columns'] as $column) {
                    if($column['searchable'] == 'true') {
                        $query->orWhere($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
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

        ->orderBy($_POST['columns'][$_POST['order'][0]['column']]['data'], $_POST['order'][0]['dir'])
        ->orderBy('edit_date', 'desc');

        $filtered = $records->count();

        $records = $records
        ->limit($_POST['length'])
        ->offset($_POST['start'])
        ->get();

        $json_data = array(
            "draw"            => intval($_POST['draw']),
            "recordsTotal"    => Investment::count(),
            "recordsFiltered" => $filtered,
            "data"            => $records
        );

        return $json_data;
    }

    /**
     * Generate zip archive 
     * 
     * @param App\Investment $id
     * @param array $extensions
     * 
     * @return redirect App\Http\Controllers\API\FilesController@zipFiles
     */
    public function zip_files($id)
    {
        $investment = Investment::findOrFail($id);
        $files = $investment->files->where('extension', 'pdf');

        return redirect()->route('files.zip', ['id' => $files->pluck('id')->toArray(), 'name' => $investment->extended_name()]);
    }
}
