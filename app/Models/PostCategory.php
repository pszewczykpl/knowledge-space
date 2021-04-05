<?php

namespace App\Models;

use App\Events\PostCategoryCreated;
use App\Events\PostCategoryDeleted;
use App\Events\PostCategorySaved;
use App\Events\PostCategoryUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'description',
    ];

    protected $dispatchesEvents = [
        'saved' => PostCategorySaved::class,
        'created' => PostCategoryCreated::class,
        'updated' => PostCategoryUpdated::class,
        'deleted' => PostCategoryDeleted::class,
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
}
