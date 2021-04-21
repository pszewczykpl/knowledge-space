<?php

namespace App\Models;

use App\Events\FileCategoryCreated;
use App\Events\FileCategoryDeleted;
use App\Events\FileCategorySaved;
use App\Events\FileCategoryUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class FileCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'prefix',
    ];

    public function files()
    {
        return $this->hasMany('App\Models\File');
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
    
        $files = Cache::tags(['file_categories', 'files'])->rememberForever('file_categories_' . $this->id . '_files', function () {
            return $this->getRelationValue('files');
        });
        $this->setRelation('files', $files);

        return $files;
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Get the author that created the file category.
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
    
        $user = Cache::tags(['file_categories', 'users'])->rememberForever('file_categories_' . $this->id . '_user', function () {
            return $this->getRelationValue('user');
        });
        $this->setRelation('user', $user);
        
        return $user;
    }

}
