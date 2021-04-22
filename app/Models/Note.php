<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Note extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
    ];

    public function investments()
    {
        return $this->morphedByMany('App\Models\Investment', 'noteable')->withTimestamps();
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

    public function protectives()
    {
        return $this->morphedByMany('App\Models\Protective', 'noteable')->withTimestamps();
    }

    /**
     * Set protectives attribute value from cached data.
     *
     * @return mixed
     */
    public function getProtectivesAttribute()
    {
        return $this->getCachedRelation('protectives', ['protectives']);
    }

    public function bancassurances()
    {
        return $this->morphedByMany('App\Models\Bancassurance', 'noteable')->withTimestamps();
    }

    /**
     * Set bancassurances attribute value from cached data.
     *
     * @return mixed
     */
    public function getBancassurancesAttribute()
    {
        return $this->getCachedRelation('bancassurances', ['bancassurances']);
    }

    public function employees()
    {
        return $this->morphedByMany('App\Models\Employee', 'noteable')->withTimestamps();
    }

    /**
     * Set employees attribute value from cached data.
     *
     * @return mixed
     */
    public function getEmployeesAttribute()
    {
        return $this->getCachedRelation('employees', ['employees']);
    }

    public function funds()
    {
        return $this->morphedByMany('App\Models\Fund', 'noteable')->withTimestamps();
    }

    /**
     * Set funds attribute value from cached data.
     *
     * @return mixed
     */
    public function getFundsAttribute()
    {
        return $this->getCachedRelation('funds', ['funds']);
    }

    public function partners()
    {
        return $this->morphedByMany('App\Models\Partner', 'noteable')->withTimestamps();
    }

    /**
     * Set partners attribute value from cached data.
     *
     * @return mixed
     */
    public function getPartnersAttribute()
    {
        return $this->getCachedRelation('partners', ['partners']);
    }

    public function risks()
    {
        return $this->morphedByMany('App\Models\Risk', 'noteable')->withTimestamps();
    }

    /**
     * Set risks attribute value from cached data.
     *
     * @return mixed
     */
    public function getRisksAttribute()
    {
        return $this->getCachedRelation('risks', ['risks']);
    }

    /**
     * Get all of the note's events.
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

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    /**
     * Set attachments attribute value from cached data.
     *
     * @return mixed
     */
    public function getAttachmentsAttribute()
    {
        return $this->getCachedRelation('attachments', ['attachments']);
    }

    /**
     * Get the user that created the note.
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

        $data = Cache::tags(array_push($tags, 'notes'))->rememberForever('notes_' . $this->id . '_' . $relation, function () use ($relation) {
            return $this->getRelationValue($relation);
        });

        $this->setRelation($relation, $data);

        return $data;
    }

}
