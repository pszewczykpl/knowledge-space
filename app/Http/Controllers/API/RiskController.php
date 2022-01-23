<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Risk;
use App\Repositories\Facades\DataTable;
use App\Traits\HasDatatables;
use Illuminate\Http\Request;

class RiskController extends Controller
{
    /**
     * Display a listing of the resource for datatables.net plugin.
     *
     * @return array
     */
    public function datatables(Request $request)
    {
        return DataTable::of(Risk::class, $request)->get();
    }

}
