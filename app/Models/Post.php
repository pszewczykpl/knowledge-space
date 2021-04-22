<?php

namespace App\Models;

use App\Events\PostCreated;
use App\Events\PostDeleted;
use App\Events\PostSaved;
use App\Events\PostUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'content',
    ];

    public function postCategory()
    {
        return $this->belongsTo('App\Models\PostCategory');
    }

    /**
     * Set postCategory attribute value from cached data.
     *
     * @return mixed
     */
    public function getPostCategoryAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('postCategory')) {
            return $this->getRelationValue('postCategory');
        }
    
        $postCategory = Cache::tags(['posts', 'post_categories'])->rememberForever('posts_' . $this->id . '_post_category', function () {
            return $this->getRelationValue('postCategory');
        });
        $this->setRelation('postCategory', $postCategory);

        return $postCategory;
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    /**
     * Set attachments attribute value from cached data.
     *
     * @return mixed
     */
    public function getAttachmentsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('attachments')) {
            return $this->getRelationValue('attachments');
        }
    
        $attachments = Cache::tags(['posts', 'attachments'])->rememberForever('posts_' . $this->id . '_attachments', function () {
            return $this->getRelationValue('attachments');
        });
        $this->setRelation('attachments', $attachments);

        return $attachments;
    }

    /**
     * Get all of the post's events.
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
    
        $events = Cache::tags(['posts', 'events'])->rememberForever('posts_' . $this->id . '_events', function () {
            return $this->getRelationValue('events');
        });
        $this->setRelation('events', $events);

        return $events;
    }

    /**
     * Get the author that created the post.
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
    
        $user = Cache::tags(['posts', 'users'])->rememberForever('posts_' . $this->id . '_user', function () {
            return $this->getRelationValue('user');
        });
        $this->setRelation('user', $user);
        
        return $user;
    }

}
