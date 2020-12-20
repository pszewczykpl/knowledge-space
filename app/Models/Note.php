<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'content',
    ];

    public function investments()
    {
        return $this->morphedByMany('App\Models\Investment', 'noteable')->withTimestamps();
    }

    public function protectives()
    {
        return $this->morphedByMany('App\Models\Protective', 'noteable')->withTimestamps();
    }

    public function bancassurances()
    {
        return $this->morphedByMany('App\Models\Bancassurance', 'noteable')->withTimestamps();
    }

    public function employees()
    {
        return $this->morphedByMany('App\Models\Employee', 'noteable')->withTimestamps();
    }

    public function funds()
    {
        return $this->morphedByMany('App\Models\Fund', 'noteable')->withTimestamps();
    }

    public function partners()
    {
        return $this->morphedByMany('App\Models\Partner', 'noteable')->withTimestamps();
    }

    public function risks()
    {
        return $this->morphedByMany('App\Models\Risk', 'noteable')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
