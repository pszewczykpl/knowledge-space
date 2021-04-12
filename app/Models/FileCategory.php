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

    protected $dispatchesEvents = [
        'saved' => FileCategorySaved::class,
        'created' => FileCategoryCreated::class,
        'updated' => FileCategoryUpdated::class,
        'deleted' => FileCategoryDeleted::class,
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

    public function get_cached_relation(string $relation)
    {
        return Cache::tags(['file_category', $relation, 'users'])->rememberForever('file_categories_' . $this->id . '_' . $relation .'_user_get', function () use ($relation) {
            return $this->{$relation}()->with('user')->get();
        });
    }
}
