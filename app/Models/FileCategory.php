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

    public function user()
    {
        return $this->belongsTo('App\Models\User');
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
        return Cache::tags(['file_categories', $relation])->rememberForever('file_categories_' . $this->id . '_' . $relation, function () use ($relation) {
            return $this->{$relation};
        });
    }
}
