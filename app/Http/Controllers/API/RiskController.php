<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Traits\HasDatatables;
use Illuminate\Http\Request;

class RiskController extends Controller
{
    use HasDatatables;

    /**
     * Display a listing of the resource for datatables.net plugin.
     *
     * @return array
     */
    public function datatables(Request $request)
    {
        return $this->getJsonData($request, 'App\Models\Risk');
    }

}
