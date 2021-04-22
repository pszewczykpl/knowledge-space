<?php

namespace App\Models;

use App\Events\FileCreated;
use App\Events\FileDeleted;
use App\Events\FileSaved;
use App\Events\FileUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class File extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'path',
        'name',
        'code',
        'extension',
        'draft',
    ];

    public function investments()
    {
        return $this->morphedByMany('App\Models\Investment', 'fileable')->withTimestamps();
    }

    /**
     * Set investments attribute value from cached data.
     *
     * @return mixed
     */
    public function getInvestmentsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('investments')) {
            return $this->getRelationValue('investments');
        }
    
        $investments = Cache::tags(['files', 'investments'])->rememberForever('files_' . $this->id . '_investments', function () {
            return $this->getRelationValue('investments');
        });
        $this->setRelation('investments', $investments);

        return $investments;
    }

    public function employees()
    {
        return $this->morphedByMany('App\Models\Employee', 'fileable')->withTimestamps();
    }

    /**
     * Set employees attribute value from cached data.
     *
     * @return mixed
     */
    public function getEmployeesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('employees')) {
            return $this->getRelationValue('employees');
        }
    
        $employees = Cache::tags(['files', 'employees'])->rememberForever('files_' . $this->id . '_employees', function () {
            return $this->getRelationValue('employees');
        });
        $this->setRelation('employees', $employees);

        return $employees;
    }

    public function protectives()
    {
        return $this->morphedByMany('App\Models\Protective', 'fileable')->withTimestamps();
    }

    /**
     * Set protectives attribute value from cached data.
     *
     * @return mixed
     */
    public function getProtectivesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('protectives')) {
            return $this->getRelationValue('protectives');
        }
    
        $protectives = Cache::tags(['files', 'protectives'])->rememberForever('files_' . $this->id . '_protectives', function () {
            return $this->getRelationValue('protectives');
        });
        $this->setRelation('protectives', $protectives);

        return $protectives;
    }

    public function bancassurances()
    {
        return $this->morphedByMany('App\Models\Bancassurance', 'fileable')->withTimestamps();
    }

    /**
     * Set bancassurances attribute value from cached data.
     *
     * @return mixed
     */
    public function getBancassurancesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('bancassurances')) {
            return $this->getRelationValue('bancassurances');
        }
    
        $bancassurances = Cache::tags(['files', 'bancassurances'])->rememberForever('files_' . $this->id . '_bancassurances', function () {
            return $this->getRelationValue('bancassurances');
        });
        $this->setRelation('bancassurances', $bancassurances);

        return $bancassurances;
    }

    public function fileCategory()
    {
        return $this->belongsTo('App\Models\FileCategory');
    }

    /**
     * Set fileCategory attribute value from cached data.
     *
     * @return mixed
     */
    public function getFileCategoryAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('fileCategory')) {
            return $this->getRelationValue('fileCategory');
        }
    
        $fileCategory = Cache::tags(['files', 'file_categories'])->rememberForever('files_' . $this->id . '_file_category', function () {
            return $this->getRelationValue('fileCategory');
        });
        $this->setRelation('fileCategory', $fileCategory);

        return $fileCategory;
    }

    /**
     * Get all of the file's events.
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
    
        $events = Cache::tags(['files', 'events'])->rememberForever('files_' . $this->id . '_events', function () {
            return $this->getRelationValue('events');
        });
        $this->setRelation('events', $events);

        return $events;
    }

    /**
     * Get the author that created the file.
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
    
        $user = Cache::tags(['files', 'users'])->rememberForever('files_' . $this->id . '_user', function () {
            return $this->getRelationValue('user');
        });
        $this->setRelation('user', $user);
        
        return $user;
    }

}