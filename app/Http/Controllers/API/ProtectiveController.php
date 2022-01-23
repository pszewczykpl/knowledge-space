<?php

namespace App\Http\Controllers\API;

use App\Models\Protective;
use App\Repositories\Facades\DataTable;
use App\Traits\HasDatatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProtectiveController extends Controller
{
    /**
     * Display a listing of the resource for datatables.net plugin.
     *
     * @param Request $request
     * @return array
     */
    public function datatables(Request $request): array
    {
        return DataTable::of(Protective::class, $request)->get();
    }

    /**
     * Generate zip archive 
     * 
     * @param \App\Models\Protective $id
     * @param array $extensions
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function zip_files($id)
    {
        $protective = Protective::findOrFail($id);
        $files = $protective->files->where('draft', false);

        return redirect()->route('files.zip', ['id' => $files->pluck('id')->toArray(), 'name' => str_replace(['/', '\\', ':', '*', '<', '>', '?', '"', '|'], "_", $protective->extended_name)]);
    }

}
