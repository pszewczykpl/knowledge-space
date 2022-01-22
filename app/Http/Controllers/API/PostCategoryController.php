<?php

namespace App\Http\Controllers\API;

use App\Models\PostCategory;

use App\Http\Controllers\Controller;
use App\Repositories\Facades\DataTable;
use App\Traits\HasDatatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource for datatables.net plugin.
     *
     * @param Request $request
     * @return array
     */
    public function datatables(Request $request): array
    {
        return DataTable::of(PostCategory::class, $request)->get();
    }

}
