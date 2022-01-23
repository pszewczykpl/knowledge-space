<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Facades\DataTable;
use App\Traits\HasDatatables;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource for datatables.net plugin.
     *
     * @param Request $request
     * @return array
     */
    public function datatables(Request $request): array
    {
        return DataTable::of(User::class, $request)->get();
    }

}
