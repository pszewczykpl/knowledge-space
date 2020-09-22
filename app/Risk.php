<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Risk extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'code',
        'name',
        'category',
        'group',
        'grace_period',
    ];

    public function notes()
    {
        return $this->morphToMany('App\Note', 'noteable')->withTimestamps();
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
