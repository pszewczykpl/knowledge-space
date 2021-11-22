<?php

namespace App\Traits;

use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use function MongoDB\BSON\toJSON;

trait HasDatatables {

    /**
     * @param Request $request
     * @param string $model
     * @param array $with
     * @return array
     */
    private function getJsonData(Request $request, string $model, array $with = []): array
    {
        $records = 
            
            $model::with($with)->select('*')

            ->when(! is_null($request->input('search.value')), function ($records) use ($request) {
                return $records->where(function ($query) use ($request) {
                    foreach($request->input(key: 'columns') as $column) {
                        if($column['searchable'] == 'true') {
                            $query->orWhere($column['data'], 'like', '%' . trim($request->input('search.value')) . '%');
                        }
                    }
                });
            })

            ->where(function ($query) use ($request) {
                foreach($request->input('columns') as $column) {
                    if((! is_null($column['search']['value'])) and $column['searchable'] == 'true') {
                        if($column['search']['regex'] == 'false') {
                            $query->where($column['data'], '=', trim($column['search']['value']));
                        } else {
                            $query->where($column['data'], 'like', '%' . trim($column['search']['value']) . '%');
                        }
                    }
                }
            })

            ->orderBy($request->input('columns')[$request->input('order.0.column')]['data'], $request->input('order.0.dir'))
            ->orderBy('id', 'desc');

        $filtered = $records->count();

        $records = $records->when($request->input('length') != '-1', function ($records) use ($request) {
                return $records
                    ->limit($request->input('length'))
                    ->offset($request->input('start'));
            })
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

    /**
     * @return array|mixed
     */
    public static function datatablesDeferData()
    {
        return Cache::tags([self::getModel()->getTable()])->rememberForever(self::getModel()->getTable() . '_datatable_index', function () {
            return self::where(self::$datatables['where'] ?? [])->orderBy(self::$datatables['orderBy'][0] ?? 'id', self::$datatables['orderBy'][1] ?? 'desc')->orderBy('id', 'desc')->take(15)->get();
        });
    }

    /**
     * @return array
     */
    public static function getDatatablesData(): array
    {
        $records_total = Cache::tags([self::getModel()->getTable()])->rememberForever(self::getModel()->getTable() . '_start_count', function () {
            return self::where(self::$datatables['where'] ?? [])->count();
        });

        return array(
            'columns'   => self::$datatables['columns'],
            'deferData' => self::datatablesDeferData(),
            'rowsCount' => $records_total
        );
    }

}