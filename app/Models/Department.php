<?php

namespace App\Models;

use App\Events\DepartmentCreated;
use App\Events\DepartmentDeleted;
use App\Events\DepartmentSaved;
use App\Events\DepartmentUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;

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
     * Set users attribute value from cached data.
     *
     * @return mixed
     */
    public function getUsersAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('users')) {
            return $this->getRelationValue('users');
        }
    
        $users = Cache::tags(['departments', 'users'])->rememberForever('departments_' . $this->id . '_users', function () {
            return $this->getRelationValue('users');
        });
        $this->setRelation('users', $users);

        return $users;
    }

    /**
     * Get all of the department's events.
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
    
        $events = Cache::tags(['departments', 'events'])->rememberForever('departments_' . $this->id . '_events', function () {
            return $this->getRelationValue('events');
        });
        $this->setRelation('events', $events);

        return $events;
    }

    /**
     * Get the author that created the department.
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
    
        $user = Cache::tags(['departments', 'users'])->rememberForever('departments_' . $this->id . '_user', function () {
            return $this->getRelationValue('user');
        });
        $this->setRelation('user', $user);
        
        return $user;
    }

}
