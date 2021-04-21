<?php

namespace App\Models;

use App\Events\ReplyCreated;
use App\Events\ReplyDeleted;
use App\Events\ReplySaved;
use App\Events\ReplyUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Reply extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'content',
    ];

    public function news()
    {
        return $this->belongsTo('App\Models\News');
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }
    
    /**
     * Get the author that created the reply.
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
    
        $user = Cache::tags(['replies', 'users'])->rememberForever('replies_' . $this->id . '_user', function () {
            return $this->getRelationValue('user');
        });
        $this->setRelation('user', $user);
        
        return $user;
    }

}
