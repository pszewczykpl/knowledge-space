<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use SoftDeletes;
    
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

    public function partners()
    {
        return $this->morphedByMany('App\Partner', 'noteable')->withTimestamps();
    }

    public function risks()
    {
        return $this->morphedByMany('App\Risk', 'noteable')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
