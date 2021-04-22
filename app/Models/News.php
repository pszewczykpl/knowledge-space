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

    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }

    /**
     * Set replies attribute value from cached data.
     *
     * @return mixed
     */
    public function getRepliesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('replies')) {
            return $this->getRelationValue('replies');
        }
    
        $replies = Cache::tags(['news', 'replies'])->rememberForever('news_' . $this->id . '_replies', function () {
            return $this->getRelationValue('replies');
        });
        $this->setRelation('replies', $replies);

        return $replies;
    }

    /**
     * Get all of the news's events.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Set events attribute value from cached data.
     *
     * @return mixed
     */
    public function getEventsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('events')) {
            return $this->getRelationValue('events');
        }
    
        $events = Cache::tags(['news', 'events'])->rememberForever('news_' . $this->id . '_events', function () {
            return $this->getRelationValue('events');
        });
        $this->setRelation('events', $events);

        return $events;
    }

    /**
     * Get the author that created the news.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Set user attribute value from cached data.
     *
     * @return mixed
     */
    public function getUserAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('user')) {
            return $this->getRelationValue('user');
        }
    
        $user = Cache::tags(['news', 'users'])->rememberForever('news_' . $this->id . '_user', function () {
            return $this->getRelationValue('user');
        });
        $this->setRelation('user', $user);
        
        return $user;
    }

}
