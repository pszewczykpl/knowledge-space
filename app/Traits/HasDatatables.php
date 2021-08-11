<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

trait HasDatatables {

    /**
     * @param Request $request
     * @param string $model
     * @return array
     */
    private function getJsonData(Request $request, string $model): array
    {
        $records = $model::select('*')

            ->where(function ($query) use ($request) {
                if($request->has('search.value')) {
                    foreach($request->input('columns') as $column) {
                        if($column['searchable'] == 'true') {
                            $query->orWhere($column['data'], 'like', '%' . trim($request->input('search.value')) . '%');
                        }
                    }
                }
            })

            ->where(function ($query) use ($request) {
                foreach($request->input('columns') as $column) {
                    if($column['searchable'] == 'true' && $column['search']['value'] != null) {
                        $query->where($column['data'], 'like', '%' . trim($column['search']['value']) . '%');
                    }
                }
            })

            ->orderBy($request->input('columns')[$request->input('order.0.column')]['data'], $request->input('order.0.dir'))
            ->orderBy('id', 'desc');

        $filtered = $records->count();

        $records = $records
            ->limit($request->input('length'))
            ->offset($request->input('start'))
            ->get();

        $records_total = Cache::tags([$model::getModel()->getTable()])->rememberForever($model::getModel()->getTable() . '_count', function () use ($model) {
            return $model::count();
        });

        return array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => $records_total,
            "recordsFiltered" => $filtered,
            "data"            => $records
        );
    }

    public static function datatablesDeferData()
    {
        return Cache::tags([self::getModel()->getTable()])->rememberForever(self::getModel()->getTable() . '_datatable_index', function () {
            return self::where(self::$datatables['where'] ?? [])->orderBy(self::$datatables['orderBy'][0] ?? 'id', self::$datatables['orderBy'][1] ?? 'desc')->orderBy('id', 'desc')->take(15)->get();
        });
    }

    public static function getDatatablesData()
    {
        $records_total = Cache::tags([self::getModel()->getTable()])->rememberForever(self::getModel()->getTable() . '_start_count', function () {
            return self::where(self::$datatables['where'] ?? [])->count();
        });

        return [
            'columns' => self::$datatables['columns'],
            'deferData' => self::datatablesDeferData(),
            'rowsCount' => $records_total
        ];
    }

}