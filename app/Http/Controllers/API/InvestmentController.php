<?php

namespace App\Http\Controllers\API;

use App\Models\Investment;
use App\Repositories\Facades\DataTable;
use App\Traits\HasDatatables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource for datatables.net plugin.
     *
     * @param Request $request
     * @return array
     */
    public function datatables(Request $request): array
    {
        return DataTable::of(Investment::class, $request)
            ->setColumns(['name', 'code_toil', 'code', 'group', 'edit_date', 'id', 'status', 'dist', 'dist_short', 'code_owu', 'type'])
            ->get();
    }

    /**
     * Generate zip archive 
     * 
     * @param App\Investment $id
     * @param array $extensions
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function zip_files($id)
    {
        $investment = Investment::findOrFail($id);
        $files = $investment->files->where('draft', false);

        return redirect()->route('files.zip', ['id' => $files->pluck('id')->toArray(), 'name' => str_replace(['/', '\\', ':', '*', '<', '>', '?', '"', '|'], "_", $investment->extended_name)]);
    }

}
