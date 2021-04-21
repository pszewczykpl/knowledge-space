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

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }
    
    /**
     * Get the author that created the system.
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
    
        $user = Cache::tags(['systems', 'users'])->rememberForever('systems_' . $this->id . '_user', function () {
            return $this->getRelationValue('user');
        });
        $this->setRelation('user', $user);
        
        return $user;
    }
    
}
