<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestmentGroup extends Model
{
    protected $fillable = [
        'code',
        'name',
        'type',
        'description',
        'sale_date_from',
    ];
}
