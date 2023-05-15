<?php

namespace App\Traits;

trait DatabaseField
{
    public static function list(): array
    {
        return array_column(static::cases(), 'value');
    }
}
