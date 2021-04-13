<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
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
     * @return string
     */
    public function search(Search $request, string $scope)
    {
        $value = trim($request->value);
        $active = $request->non_active ? ['A', 'N'] : ['A'];
        $columns = [
            'investments' => ['name', 'code_owu', 'code_toil', 'code', 'group', 'dist'],
            'protectives' => ['name', 'code_owu', 'code', 'dist'],
            'bancassurances' => ['name', 'code_owu', 'code', 'dist'],
            'employees' => ['name', 'code_owu'],
            'funds' => ['name', 'code', 'type'],
            'risks' => ['name', 'code', 'type'],
            'posts' => ['title', 'content'],
            'news' => ['content'],
            'partners' => ['name', 'nip', 'regon', 'numer_rau'],
            'systems' => ['name', 'url'],
            'files' => ['name'],
            'departments' => ['name'],
        ];

        /**
         * Search Employees.
         */
        $employees = \App\Models\Employee::select('*')
            ->where(function ($query) use ($value, $columns) {
                foreach($columns['employees'] as $column) {
                    $query->orWhere($column, 'like', '%' . $value . '%');
                }
            })
            ->whereIn('status', $active)
            ->get();

        /**
         * Search Bancassurances.
         */
        $bancassurances = \App\Models\Bancassurance::select('*')
            ->where(function ($query) use ($value, $columns) {
                foreach($columns['bancassurances'] as $column) {
                    $query->orWhere($column, 'like', '%' . $value . '%');
                }
            })
            ->whereIn('status', $active)
            ->get();

        /**
         * Search Protectives.
         */
        $protectives = \App\Models\Protective::select('*')
            ->where(function ($query) use ($value, $columns) {
                foreach($columns['protectives'] as $column) {
                    $query->orWhere($column, 'like', '%' . $value . '%');
                }
            })
            ->whereIn('status', $active)
            ->get();

        /**
         * Search Investments.
         */
        $investments = \App\Models\Investment::select('*')
            ->where(function ($query) use ($value, $columns) {
                foreach($columns['investments'] as $column) {
                    $query->orWhere($column, 'like', '%' . $value . '%');
                }
            })
            ->whereIn('status', $active)
            ->get();

        if($investments->count() === 1 and (count($protectives) === 0 and count($bancassurances) === 0 and count($employees) === 0)) {
            return redirect()->route('investments.show', $investments->first()->id);
        }
        if($protectives->count() === 1 and (count($investments) === 0 and count($bancassurances) === 0 and count($employees) === 0)) {
            return redirect()->route('protectives.show', $protectives->first()->id);
        }
        if($bancassurances->count() === 1 and (count($protectives) === 0 and count($investments) === 0 and count($employees) === 0)) {
            return redirect()->route('bancassurances.show', $bancassurances->first()->id);
        }
        if($employees->count() === 1 and (count($protectives) === 0 and count($bancassurances) === 0 and count($investments) === 0)) {
            return redirect()->route('employees.show', $employees->first()->id);
        }         

        return view('search.results', [
            'title' => 'Wyniki wyszukiwania',
            'value' => $value,
            'active' => $active,
            'investments' => $investments,
            'protectives' => $protectives,
            'bancassurances' => $bancassurances,
            'employees' => $employees,
        ]);
    }
}
