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

    public function employees()
    {
        return $this->morphedByMany('App\Models\Employee', 'fileable')->withTimestamps();
    }

    public function protectives()
    {
        return $this->morphedByMany('App\Models\Protective', 'fileable')->withTimestamps();
    }

    public function bancassurances()
    {
        return $this->morphedByMany('App\Models\Bancassurance', 'fileable')->withTimestamps();
    }

    public function file_category()
    {
        return $this->belongsTo('App\Models\FileCategory');
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
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