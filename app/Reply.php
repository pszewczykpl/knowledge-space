<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'content',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function news()
    {
        return $this->belongsTo('App\News');
    }
}
