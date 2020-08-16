<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\File;

class FilesController extends Controller
{
    /**
     * Show File
     *
     * @param  int  $id
     * @return View
     */
    public function show($id) {
        $file = File::findOrFail($id);

        if($file->extension == 'pdf') {
            return Storage::download(
                $file->path, 
                $file->name . '.' . $file->extension, 
                [
                    'Content-type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="'. $file->name . '.' . $file->extension .'"',
                    'Content-Transfer-Encoding' => 'binary',
                    'Accept-Ranges' => 'bytes'
                ]
            );
        }
        
        return redirect()->route('files.download', $file->id);
    }

    /**
     * Download File
     *
     * @param  int  $id
     * @return View
     */
    public function download($id) {
        $file = File::findOrFail($id);

        return Storage::download($file->path, $file->name . '.' . $file->extension);
    }

}
