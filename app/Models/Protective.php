<?php

namespace App\Models;

use App\Traits\CacheModels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Protective extends Model
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
        'name',
        'code',
        'dist_short',
        'dist',
        'code_owu',
        'subscription',
        'edit_date',
        'status',
    ];

    /**
     * Get all of the files for the protective.
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
        return $this->getCachedRelation('files');
    }

    public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }

    /**
     * Get notes attribute value from cached data.
     *
     * @return mixed
     */
    public function getNotesAttribute()
    {
        return $this->getCachedRelation('notes');
    }

    /**
     * Get all of the protective's events.
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
        return $this->getCachedRelation('events');
    }

    public function extended_name()
    {
        return $this->name . ' (' . $this->dist_short . ') od ' . $this->edit_date;
    }

    /**
     * Get the user that created the protective.
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
