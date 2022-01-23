<?php

namespace App\Http\Controllers\API;

use App\Models\Bancassurance;
use App\Repositories\Facades\DataTable;
use App\Traits\HasDatatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
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
     * @param $bancassurance
     * @return RedirectResponse App\Http\Controllers\API\FilesController@zipFiles
     */
    public function zipFiles(Bancassurance $bancassurance)
    {
        $files = $bancassurance->files->where('draft', false);

        return redirect()->route('files.zip', ['id' => $files->pluck('id')->toArray(), 'filename' => str_replace(['/', '\\', ':', '*', '<', '>', '?', '"', '|'], "_", $bancassurance->extended_name)]);
    }

}
