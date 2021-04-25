<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\CacheModels;

class Attachment extends Model
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
        'path',
        'name',
        'extension',
    ];

    /**
     * Get the parent attachmentable model (note or post or news or reply).
     */
    public function attachmentable()
    {
        return $this->morphTo();
    }

    /**
     * Get all of the attachment's events.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Get events attribute value from cached data.
     */
    public function getEventsAttribute()
    {
        return $this->getCachedRelation('events');
    }

    /**
     * Get the user that created the attachment.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get user attribute value from cached data.
     */
    public function getUserAttribute()
    {
        return $this->getCachedRelation('user');
    }

}