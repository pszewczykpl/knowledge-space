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
    
        $notes = Cache::tags(['risks', 'notes'])->rememberForever('risks_' . $this->id . '_notes', function () {
            return $this->getRelationValue('notes');
        });
        $this->setRelation('notes', $notes);
        
        return $notes;
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }
    
    /**
     * Get the author that created the risk.
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
    
        $user = Cache::tags(['risks', 'users'])->rememberForever('risks_' . $this->id . '_user', function () {
            return $this->getRelationValue('user');
        });
        $this->setRelation('user', $user);
        
        return $user;
    }

}
