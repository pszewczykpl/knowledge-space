<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Fund extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'status',
        'type',
        'currency',
        'cancel_date',
        'start_date',
        'cancel_reason'
    ];

    public function investments()
    {
        return $this->belongsToMany('App\Models\Investment')->withTimestamps();
    }

    /**
     * Set investments attribute value from cached data.
     *
     * @return mixed
     */
    public function getInvestmentsAttribute()
    {
        return $this->getCachedRelation('investments', ['investments']);
    }

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
        return $this->getCachedRelation('notes', ['notes']);
    }

    /**
     * Get all of the fund's events.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Set events attribute value from cached data.
     *
     * @return mixed
     */
    public function getEventsAttribute()
    {
        return $this->getCachedRelation('events', ['events']);
    }

    public function extended_name()
    {
        return $this->name . ' (' . $this->code . ')';
    }

    public function getTypeAttribute()
    {
        switch ($this->attributes['type']) {
            case('Z'):
                return 'Inwestycyjny';
            case('M'):
                return 'Modelowy';
            case('U'):
                return 'UFK';
            case('S'):
                return 'SOK';
            case('T'):
                return 'Tracker';
            default:
                return $this->attributes['type'];
        }
    }

    /**
     * Get the user that created the fund.
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
        return $this->getCachedRelation('user', ['users']);
    }

    /**
     * Get relations data from cache.
     *
     * @param string $relation
     * @param array $tags
     * @return mixed
     */
    public function getCachedRelation(string $relation, array $tags = [])
    {
        if ($this->relationLoaded($relation)) {
            return $this->getRelationValue($relation);
        }

        $data = Cache::tags(array_push($tags, 'funds'))->rememberForever('funds_' . $this->id . '_' . $relation, function () use ($relation) {
            return $this->getRelationValue($relation);
        });

        $this->setRelation($relation, $data);

        return $data;
    }
    
}
