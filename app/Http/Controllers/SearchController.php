<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Display a search results.
     *
     * @param $value
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search.index', [
            'title' => 'Szukaj',
        ]);
    }

    /**
     * Display a search results.
     *
     * @param $value
     * @return \Illuminate\Http\Response
     */
    public function search(SearchRequest $request, string $scope)
    {
        return view('search.results', [
            'title' => 'Wyniki wyszukiwania',
            'value' => $request->value,
            'investments' => Investment::where('code_owu', 'like', '%' . $request->value . '%')->paginate(20)->withQueryString(),
        ]);
    }
}
