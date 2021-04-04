<?php

namespace App\Models;

use App\Events\NewsSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'content',
    ];

    protected $dispatchesEvents = [
        'saved' => NewsSaved::class
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }

    public function get_replies()
    {
        return Cache::tags(['news', 'replies', 'users'])->rememberForever('news_' . $this->id . '_replies_all', function () {
            return $this->replies()->with('user')->get();
        });
    }
}
