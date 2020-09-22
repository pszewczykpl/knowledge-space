<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fund extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'code',
        'name',
        'status',
        'type',
        'currency',
        'cancel_date',
        'start_date',
        'cancel_reason'
    ];

    public function investments()
    {
        return $this->belongsToMany('App\Investment')->withTimestamps();
    }

    public function files()
    {
        return $this->morphToMany('App\File', 'fileable')->withTimestamps();
    }

    public function notes()
    {
        return $this->morphToMany('App\Note', 'noteable')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
