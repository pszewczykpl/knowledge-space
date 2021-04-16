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

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Get cached relation with user.
     *
     * @param string $relation
     * @return array|mixed
     */
    public function getCachedRelation(string $relation)
    {
        return Cache::tags([$relation, 'users'])->rememberForever('users_' . $this->id . '_' . $relation .'_user_get', function () use ($relation) {
            return $this->{$relation}()->with('user')->get();
        });
    }
}
