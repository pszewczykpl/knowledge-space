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

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
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
