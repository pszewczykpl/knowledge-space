<?php

namespace App\Models;

use App\Traits\CacheModels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Event extends Model
{
    use HasFactory;
    use CacheModels;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event'
    ];

    public function eventable()
    {
        return $this->morphTo();
    }

    /**
     * Get the user that performed the actions.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get user attribute value from cached data.
     *
     * @return mixed
     */
    public function getUserAttribute()
    {
        return $this->getCachedRelation('user');
    }

}
