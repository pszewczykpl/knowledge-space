<?php

namespace App\Traits;

use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use function MongoDB\BSON\toJSON;

trait HasDatatables {

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