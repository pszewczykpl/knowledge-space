<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'number_rau',
        'code',
        'nip',
        'regon',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function notes()
    {
        return $this->morphToMany('App\Note', 'noteable')->withTimestamps();
    }
}
