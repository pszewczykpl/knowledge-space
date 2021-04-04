<?php

namespace App\Http\Controllers\API;

use App\Models\Bancassurance;
use App\Models\File;
use App\Models\FileCategory;

use ZipArchive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class BancassuranceController extends Controller
{
    /**
     * Display a listing of the resource for datatables.net plugin
     *
     * @return array
     */
    public function datatables(Request $request)
    {
        $records = Bancassurance::select('*')
        
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

        ->orderBy($_POST['columns'][$_POST['order'][0]['column']]['data'], $_POST['order'][0]['dir'])
        ->orderBy('edit_date', 'desc');

        $filtered = $records->count();

        $records = $records
        ->limit($_POST['length'])
        ->offset($_POST['start'])
        ->get();

        $json_data = array(
            "draw"            => intval($_POST['draw']),
            "recordsTotal"    => Bancassurance::count(),
            "recordsFiltered" => $filtered,
            "data"            => $records
        );

        return $json_data;
    }

    /**
     * Generate zip archive 
     * 
     * @param App\Bancassurance $id
     * @param array $extensions
     * 
     * @return \Illuminate\Http\RedirectResponse App\Http\Controllers\API\FilesController@zipFiles
     */
    public function zip_files($id)
    {
        $bancassurance = Bancassurance::findOrFail($id);
        $files = $bancassurance->files->where('extension', 'pdf');

        return redirect()->route('files.zip', ['id' => $files->pluck('id')->toArray(), 'name' => $bancassurance->extended_name()]);
    }
}
