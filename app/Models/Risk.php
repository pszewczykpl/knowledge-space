<?php

namespace App\Models;

use App\Events\RiskCreated;
use App\Events\RiskDeleted;
use App\Events\RiskSaved;
use App\Events\RiskUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Risk extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'code',
        'name',
        'category',
        'group',
        'grace_period',
    ];

    public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
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
     * Get cached relation with user.
     *
     * @param string $relation
     * @return array|mixed
     */
    public function getCachedRelation(string $relation)
    {
        return Cache::tags([$relation, 'users'])->rememberForever('users_' . $this->id . '_' . $relation .'_user_get', function () use ($relation) {
            return $this->{$relation}()->with('user')->get();
        });
    }
}
