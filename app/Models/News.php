<?php

namespace App\Models;

use App\Events\NewsCreated;
use App\Events\NewsDeleted;
use App\Events\NewsSaved;
use App\Events\NewsUpdated;
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
        'saved' => NewsSaved::class,
        'created' => NewsCreated::class,
        'updated' => NewsUpdated::class,
        'deleted' => NewsDeleted::class,
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    public function get_replies()
    {
        return Cache::tags(['news', 'replies', 'users'])->rememberForever('news_' . $this->id . '_replies_all', function () {
            return $this->replies()->with('user')->get();
        });
    }
}
