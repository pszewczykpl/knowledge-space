<?php

namespace App\Models;

use App\Traits\CacheModels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Investment extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CacheModels;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group',
        'name',
        'code',
        'dist_short',
        'dist',
        'code_owu',
        'code_toil',
        'edit_date',
        'type',
        'status',
    ];

    /**
     * Get all of the files for the investment.
     */
    public function files()
    {
        return $this->morphToMany('App\Models\File', 'fileable')->withTimestamps();
    }

    /**
     * Get files attribute value from cached data.
     *
     * @return mixed
     */
    public function getFilesAttribute()
    {
        return $this->getCachedRelation('files', ['files']);
    }

    /**
     * Get all of the notes for the investment.
     */
    public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }

    /**
     * Get notes attribute value from cached data.
     *
     * @return void
     */
    public function getNotesAttribute()
    {
        return $this->getCachedRelation('notes', ['notes']);
    }

    /**
     * Get the funds that belong to the investment.
     */
    public function funds()
    {
        return $this->belongsToMany('App\Models\Fund')->withTimestamps();
    }

    /**
     * Get funds attribute value from cached data.
     *
     * @return mixed
     */
    public function getFundsAttribute()
    {
        return $this->getCachedRelation('funds', ['funds']);
    }

    /**
     * Get all of the investment's events.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Get events attribute value from cached data.
     *
     * @return mixed
     */
    public function getEventsAttribute()
    {
        return $this->getCachedRelation('events', ['events']);
    }

    public function extended_name()
    {
        return $this->name . ' (' . $this->dist_short . ') od ' . $this->edit_date;
    }

    public function fullname()
    {
        return $this->name . ' (' . $this->code_toil . ') od ' . $this->edit_date;
    }

    /**
     * Get the user that created the investment.
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
        return $this->getCachedRelation('user', ['users']);
    }

}