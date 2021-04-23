<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'description',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    /**
     * Get users attribute value from cached data.
     *
     * @return mixed
     */
    public function getUsersAttribute()
    {
        return $this->getCachedRelation('users', ['users']);
    }

    /**
     * Get all of the department's events.
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
        return $this->getCachedRelation('events', ['events']);
    }

    /**
     * Get the user that created the department.
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
        return $this->getCachedRelation('user', ['users']);
    }

    /**
     * Get relations data from cache.
     *
     * @param string $relation
     * @param array $tags
     * @return mixed
     */
    public function getCachedRelation(string $relation, array $tags = [])
    {
        if ($this->relationLoaded($relation)) {
            return $this->getRelationValue($relation);
        }

        $data = Cache::tags(array_push($tags, 'departments'))->rememberForever('departments_' . $this->id . '_' . $relation, function () use ($relation) {
            return $this->getRelationValue($relation);
        });

        $this->setRelation($relation, $data);

        return $data;
    }

}
