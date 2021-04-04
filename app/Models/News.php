<?php

namespace App\Models;

use App\Events\NewsSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'content',
    ];

    protected $dispatchesEvents = [
        'updated' => NewsSaved::class
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }
}
