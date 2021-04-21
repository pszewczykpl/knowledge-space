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

    public function post_category()
    {
        return $this->belongsTo('App\Models\PostCategory');
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
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
