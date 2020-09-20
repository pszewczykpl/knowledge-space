<?php

namespace App\Http\Controllers\API;

use App\Investment;
use App\File;
use App\FileCategory;

use ZipArchive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource for datatables.net plugin
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request)
    {
        $records = File::with('file_category')

        ->select('id', 'name', 'path', 'file_category_id')
        
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
            "recordsTotal"    => File::count(),
            "recordsFiltered" => $filtered,
            "data"            => $records
        );

        return $json_data;
    }

    /**
     * Generating ZIP archive from PDF files
     * 
     * @param request $request
     * 
     * @return file
     */
    public function zip(Request $request)
    {
        if($request->id == null) {
            abort(404);
        }
        
        $files = File::whereIn('id', $request->id)->get();

        $zip = new ZipArchive;
        if ($zip->open('tmp.zip', ZipArchive::CREATE) === TRUE) {
            foreach($files as $file) {
                
                $zip->addFile(
                    'storage/uploads/' . $file->path, 
                    $file->file_category->prefix . $file->name . '.' . $file->extension
                );
                
            }
            $zip->close();
        }

        return response()->download('tmp.zip', $request->name . '.zip')->deleteFileAfterSend();
    }
}
