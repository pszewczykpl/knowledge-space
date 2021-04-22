<?php

namespace App\Http\Controllers\API;

use App\Models\Investment;
use App\Models\File;
use App\Models\FileCategory;

use Illuminate\Support\Facades\Cache;
use ZipArchive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class FileController extends Controller
{
    /**
     * Display a listing of the resource for datatables.net plugin
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request)
    {
        $records = File::with('fileCategory')->select('*')
        
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

        $records_total = Cache::tags(['files'])->rememberForever('files_count', function () {
            return File::count();
        });

        $json_data = array(
            "draw"            => intval($_POST['draw']),
            "recordsTotal"    => $records_total,
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
        if ($zip->open('storage/tmp.zip', ZipArchive::CREATE) === TRUE) {
            foreach($files as $file) {
                
                $zip->addFile(
                    'storage/' . $file->path, 
                    $file->fileCategory->prefix . $file->name . '.' . $file->extension
                );
                
            }
            $zip->close();
        }

        return response()->download('storage/tmp.zip', $request->name . '.zip')->deleteFileAfterSend();
    }
}
