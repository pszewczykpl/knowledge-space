<?php

namespace App\Models;

use App\Traits\CacheModels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class PostCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CacheModels;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * Get posts attribute value from cached data.
     *
     * @return mixed
     */
    public function getPostsAttribute()
    {
        return $this->getCachedRelation('posts');
    }

    /**
     * Get all of the post category's events.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Get events attribute value from cached data.
     *
     * @return mixed
     */
    public function getEventsAttribute()
    {
        return $this->getCachedRelation('events');
    }

    /**
     * Get the user that created the post category.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get user attribute value from cached data.
     *
     * @return mixed
     */
    public function getUserAttribute()
    {
        return $this->getCachedRelation('user');
    }

}
