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
    public $searchModels = [
        '\App\Models\Investment' => [
            'route' => 'investments',
            'icon' => 'investment',
            'title' => 'Ubezpieczenia Inwestycyjne',
            'columns' => ['name', 'code_owu', 'code_toil', 'code', 'group', 'dist'],
            'result' => [
                'additional_data' => [
                    'code' => 'Kod produktu',
                    'group' => 'Grupa produktowa',
                ]
            ]
        ],
        '\App\Models\Protective' => [
            'route' => 'protectives',
            'icon' => 'protective',
            'title' => 'Ubezpieczenia Ochronne',
            'columns' => ['name', 'code_owu', 'code', 'dist'],
            'result' => [
                'additional_data' => [
                    'code' => 'Kod produktu',
                ]
            ]
        ],
        '\App\Models\Bancassurance' => [
            'route' => 'bancassurances',
            'icon' => 'bancassurance',
            'title' => 'Ubezpieczenia bancassurance',
            'columns' => ['name', 'code_owu', 'code', 'dist'],
            'result' => [
                'additional_data' => [
                    'code' => 'Kod produktu',
                ]
            ]
        ],
        '\App\Models\Employee' => [
            'route' => 'employees',
            'icon' => 'employee',
            'title' => 'Ubezpieczenia Pracowniczne',
            'columns' => ['name', 'code_owu'],
            'result' => [
                'additional_data' => [
                    'code' => 'Kod produktu',
                ]
            ]
        ],
//        '\App\Models\Fund' => [
//            'route' => 'funds',
//            'columns' => ['name', 'code', 'type'],
//        ],
//        '\App\Models\Risk' => [
//            'route' => 'risks',
//            'columns' => ['name', 'code', 'category'],
//        ],
//        '\App\Models\Post' => [
//            'route' => 'posts',
//            'columns' => ['title', 'content'],
//        ],
//        '\App\Models\News' => [
//            'route' => 'news',
//            'columns' => ['content'],
//        ],
//        '\App\Models\Partner' => [
//            'route' => 'partners',
//            'columns' => ['name', 'nip', 'regon', 'numer_rau'],
//        ],
//        '\App\Models\System' => [
//            'route' => 'systems',
//            'columns' => ['name', 'url'],
//        ],
//        '\App\Models\File' => [
//            'route' => 'files',
//            'columns' => ['name'],
//        ],
//        '\App\Models\Department' => [
//            'route' => 'departments',
//            'columns' => ['name'],
//        ],
    ];

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

        $resultsCount = 0;

        foreach($this->searchModels as $model => $data) {
            ${$data['route']} =
                $model::where(function ($query) use ($value, $data) {
                    foreach($data['columns'] as $column) {
                        $query->orWhere($column, 'like', '%' . $value . '%');
                    }
                })
                ->whereIn('status', $active)
                ->get();

            $resultsCount += (int) ${$data['route']}->count();
        }

        if($resultsCount === 1) {
            foreach($this->searchModels as $model => $data) {
                if(${$data['route']}->count() === 1) {
                    return redirect()->route($data['route'] . '.show', ${$data['route']}->first()->id);
                }
            }
        }

        $meta = (array) null;
        foreach($this->searchModels as $model => $data) {
            $results[$data['route']] = ${$data['route']};

            $meta[$data['route']]['icon'] = $data['icon'];
            $meta[$data['route']]['title'] = $data['title'];

            foreach ($results[$data['route']] as $key => $item) {
                $asd = (array) null;
                foreach($data['result']['additional_data'] as $key2 => $item2) {
                    $asd[$item2] = $results[$data['route']][$key]->{$key2};
                }

                $results[$data['route']][$key]->additional = $asd;
            }
        }

        return view('search.results', [
            'title' => 'Wyniki wyszukiwania',
            'value' => $value,
            'active' => $active,
            'results' => $results,
            'meta' => $meta,
        ]);
    }
}
