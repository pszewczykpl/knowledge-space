<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{
    protected $fillable = [
        'code',
        'name',
        'category',
        'group',
        'grace_period',
    ];
}
