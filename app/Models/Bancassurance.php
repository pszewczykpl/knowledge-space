<?php

namespace App\Models;

use App\Traits\CacheModels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

/**
 * @property mixed extended_name
 */
class Bancassurance extends Model
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
     * Get all of the files for the bancassurance.
     */
    public function files()
    {
        return $this->morphToMany(File::class, 'fileable')->withTimestamps();
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

    /**
     * Get all of the notes for the bancassurance.
     */
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
     * Get all of the bancassurance's events.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable')->withTimestamps();
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

    public function getExtendedNameAttribute()
    {
        return $this->name . ' (' . $this->dist_short . ') od ' . $this->edit_date;
    }

    /**
     * Get the user that created the bancassurance.
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
