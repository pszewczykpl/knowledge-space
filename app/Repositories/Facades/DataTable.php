<?php

namespace App\Repositories\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static greet()
 */
class DataTable extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'datatable';
    }
}