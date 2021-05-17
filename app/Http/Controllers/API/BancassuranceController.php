<?php

namespace App\Http\Controllers\API;

use App\Models\Bancassurance;
use App\Traits\HasDatatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BancassuranceController extends Controller
{
    use HasDatatables;

    /**
     * Display a listing of the resource for datatables.net plugin.
     *
     * @param Request $request
     * @return array
     */
    public function datatables(Request $request): array
    {
        return $this->getJsonData($request, 'App\Models\Bancassurance');
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

        return redirect()->route('files.zip', ['id' => $files->pluck('id')->toArray(), 'name' => str_replace(['/', '\\', ':', '*', '<', '>', '?', '"', '|'], "_", $bancassurance->extended_name)]);
    }

}
