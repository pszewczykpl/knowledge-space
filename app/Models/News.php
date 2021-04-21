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

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
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
