<?php

namespace App\Models;

use App\Events\SystemCreated;
use App\Events\SystemDeleted;
use App\Events\SystemSaved;
use App\Events\SystemUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class System extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'url',
        'description',
    ];

    protected $dispatchesEvents = [
        'saved' => SystemSaved::class,
        'created' => SystemCreated::class,
        'updated' => SystemUpdated::class,
        'deleted' => SystemDeleted::class,
    ];
    
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
        return Cache::tags(['system', $relation, 'users'])->rememberForever('systems_' . $this->id . '_' . $relation .'_user_get', function () use ($relation) {
            return $this->{$relation}()->with('user')->get();
        });
    }
}
