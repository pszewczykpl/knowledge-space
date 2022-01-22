<?php

namespace App\Http\Controllers\API;

use App\Models\Bancassurance;
use App\Repositories\Facades\DataTable;
use App\Traits\HasDatatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BancassuranceController extends Controller
{
    /**
     * Display a listing of the resource for datatables.net plugin.
     *
     * @param Request $request
     * @return array
     */
    public function datatables(Request $request): array
    {
        return DataTable::of(Bancassurance::class, $request)->get();
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
        $files = $bancassurance->files->where('draft', false);

        return redirect()->route('files.zip', ['id' => $files->pluck('id')->toArray(), 'name' => str_replace(['/', '\\', ':', '*', '<', '>', '?', '"', '|'], "_", $bancassurance->extended_name)]);
    }

}
