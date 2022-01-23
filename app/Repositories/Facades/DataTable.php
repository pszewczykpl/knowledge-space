<?php

namespace App\Repositories\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Request;

/**
 * @method static of(string $class, $request)
 * @method static setRequest(Request $request)
 * @method static get()
 */
class DataTable extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'datatable';
    }
}