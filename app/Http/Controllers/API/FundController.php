<?php

namespace App\Http\Controllers\API;

use App\Models\Fund;

use App\Http\Controllers\Controller;
use App\Traits\HasDatatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class FundController extends Controller
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
        return $this->getJsonData($request, 'App\Models\Fund');
    }

}
