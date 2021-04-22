<?php

namespace App\Models;

use App\Events\PostCategoryCreated;
use App\Events\PostCategoryDeleted;
use App\Events\PostCategorySaved;
use App\Events\PostCategoryUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class PostCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'description',
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * Set posts attribute value from cached data.
     *
     * @return mixed
     */
    public function getPostsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('posts')) {
            return $this->getRelationValue('posts');
        }
    
        $posts = Cache::tags(['post_categories', 'posts'])->rememberForever('post_categories_' . $this->id . '_posts', function () {
            return $this->getRelationValue('posts');
        });
        $this->setRelation('posts', $posts);

        return $posts;
    }

    /**
     * Get all of the post category's events.
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
    
        $events = Cache::tags(['post_categories', 'events'])->rememberForever('post_categories_' . $this->id . '_events', function () {
            return $this->getRelationValue('events');
        });
        $this->setRelation('events', $events);

        return $events;
    }

    /**
     * Get the author that created the post category.
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
    
        $user = Cache::tags(['post_categories', 'users'])->rememberForever('post_categories_' . $this->id . '_user', function () {
            return $this->getRelationValue('user');
        });
        $this->setRelation('user', $user);
        
        return $user;
    }

}
