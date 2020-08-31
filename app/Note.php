<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'content',
    ];

    public function investments()
    {
        return $this->morphedByMany('App\Investment', 'noteable')->withTimestamps();
    }

    public function protectives()
    {
        return $this->morphedByMany('App\Protective', 'noteable')->withTimestamps();
    }

    public function employees()
    {
        return $this->morphedByMany('App\Employee', 'noteable')->withTimestamps();
    }

    public function funds()
    {
        return $this->morphedByMany('App\Fund', 'noteable')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
