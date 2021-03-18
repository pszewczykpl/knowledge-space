<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Search;

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
    public function search(Search $request, string $scope)
    {
        // MAYBE TO DO: departments, users, file categories, files, notes, replies, permissions, post categories, attachments
        /**
         * Return Systems
         * TODO: search by  name url description
         */
        // $systems

        /**
         * Return Partners
         * TODO: search by  name number_rau code nip regon type
         */
        // $partners

        /**
         * Return News
         * TODO: search by  content
         */
        // $news

        /**
         * Return Posts
         * TODO: search by  title content
         */
        // $posts

        /**
         * Return Risks
         * TODO: search by  code name category group grace_period
         */
        // $risks

        /**
         * Return Funds
         * TODO: search by  code name type currency status start_date
         */
        // $funds

        /**
         * Return Employees
         * TODO: search by  name code_owu edit_date status
         */
        // $employees

        /**
         * Return Bancassurances
         * TODO: search by  name code dist_short dist code_owu subscription edit_date status
         */
        // $protectives

        /**
         * Return Protectives
         * TODO: search by  name code dist_short dist code_owu subscription edit_date status
         */
        // $protectives

        /**
         * Return Investments
         * TODO: search by  group name code dist_short dist code_owu code_toil edit_date type status
         */
        $investments = Investment::select('*')
            // code_owu search
            ->where('code_owu', 'like', '%' . $request->value . '%')
            // code_toil search
            ->orWhere('code_toil', 'like', '%' . $request->value . '%')
            ->paginate(20)
            ->withQueryString();

        return view('search.results', [
            'title' => 'Wyniki wyszukiwania',
            'value' => $request->value,
            'investments' => $investments,
        ]);
    }
}
