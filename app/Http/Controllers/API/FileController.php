<?php

namespace App\Http\Controllers\API;

use App\Models\Investment;
use App\Models\File;
use App\Models\FileCategory;

use App\Repositories\Facades\DataTable;
use App\Traits\HasDatatables;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\BinaryFileResponse as BinaryFileResponseAlias;
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
     * Display a listing of the resource for datatables.net plugin.
     *
     * @param Request $request
     * @return array
     */
    public function datatables(Request $request): array
    {
        return DataTable::of(File::class, $request)->setWith('fileCategory')->get();
    }

    /**
     * Generating ZIP archive from PDF files
     * 
     * @param request $request
     * 
     * @return BinaryFileResponseAlias
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
                    ($file->fileCategory->prefix ?? "") . $file->name . '.' . $file->extension
                );
                
            }
            $zip->close();
        }

        return response()->download('storage/tmp.zip', $request->filename . '.zip')->deleteFileAfterSend();
    }

}
