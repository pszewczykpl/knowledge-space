<?php

namespace App\Models;

use App\Events\EmployeeCreated;
use App\Events\EmployeeDeleted;
use App\Events\EmployeeSaved;
use App\Events\EmployeeUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'code_owu',
        'edit_date',
        'status',
    ];

    /**
     * Get all of the files for the employee.
     */
    public function files()
    {
        return $this->morphToMany('App\Models\File', 'fileable')->withTimestamps();
    }

    /**
     * Set files attribute value from cached data.
     *
     * @return mixed
     */
    public function getFilesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('files')) {
            return $this->getRelationValue('files');
        }
    
        $files = Cache::tags(['employees', 'files'])->rememberForever('employees_' . $this->id . '_files', function () {
            return $this->getRelationValue('files');
        });
        $this->setRelation('files', $files);

        return $files;
    }

    public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }

    /**
     * Set notes attribute value from cached data.
     *
     * @return mixed
     */
    public function getNotesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('notes')) {
            return $this->getRelationValue('notes');
        }
    
        $notes = Cache::tags(['employees', 'notes'])->rememberForever('employees_' . $this->id . '_notes', function () {
            return $this->getRelationValue('notes');
        });
        $this->setRelation('notes', $notes);
        
        return $notes;
    }

    /**
     * Get all of the employee's events.
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
    
        $events = Cache::tags(['employees', 'events'])->rememberForever('employees_' . $this->id . '_events', function () {
            return $this->getRelationValue('events');
        });
        $this->setRelation('events', $events);

        return $events;
    }

    public function extended_name()
    {
        return $this->name . ' od ' . $this->edit_date;
    }

    /**
     * Get the author that created the employee.
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
    
        $user = Cache::tags(['employees', 'users'])->rememberForever('employees_' . $this->id . '_user', function () {
            return $this->getRelationValue('user');
        });
        $this->setRelation('user', $user);
        
        return $user;
    }

}
