<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'path',
        'name',
        'filename',
        'extension'
    ];

    public function investments()
    {
        return $this->morphedByMany('App\Investment', 'fileable')->withTimestamps();
    }

    public function employees()
    {
        return $this->morphedByMany('App\Employee', 'fileable')->withTimestamps();
    }

    public function protectives()
    {
        return $this->morphedByMany('App\Protective', 'fileable')->withTimestamps();
    }

    public function funds()
    {
        return $this->morphedByMany('App\Fund', 'fileable')->withTimestamps();
    }

    public function file_category()
    {
        return $this->belongsTo('App\FileCategory');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}