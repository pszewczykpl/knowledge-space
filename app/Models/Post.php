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

    public function user()
    {
        return $this->belongsTo('App\Models\User');
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
     * Get cached relation.
     *
     * @param string $relation
     * @param string $field
     * @return array|mixed
     */
    public function getCachedRelation(string $relation)
    {
        return Cache::tags(['posts', $relation])->rememberForever('posts_' . $this->id . '_' . $relation, function () use ($relation) {
            return $this->{$relation};
        });
    }
}
