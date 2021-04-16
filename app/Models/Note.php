<?php

namespace App\Models;

use App\Events\NoteCreated;
use App\Events\NoteDeleted;
use App\Events\NoteSaved;
use App\Events\NoteUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Note extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'content',
    ];

    public function investments()
    {
        return $this->morphedByMany('App\Models\Investment', 'noteable')->withTimestamps();
    }

    public function protectives()
    {
        return $this->morphedByMany('App\Models\Protective', 'noteable')->withTimestamps();
    }

    public function bancassurances()
    {
        return $this->morphedByMany('App\Models\Bancassurance', 'noteable')->withTimestamps();
    }

    public function employees()
    {
        return $this->morphedByMany('App\Models\Employee', 'noteable')->withTimestamps();
    }

    public function funds()
    {
        return $this->morphedByMany('App\Models\Fund', 'noteable')->withTimestamps();
    }

    public function partners()
    {
        return $this->morphedByMany('App\Models\Partner', 'noteable')->withTimestamps();
    }

    public function risks()
    {
        return $this->morphedByMany('App\Models\Risk', 'noteable')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    /**
     * Get cached relation.
     *
     * @param string $relation
     * @param string $field
     * @return array|mixed
     */
    public function getCachedRelation(string $relation)
    {
        return Cache::tags(['notes', $relation])->rememberForever('notes_' . $this->id . '_' . $relation, function () use ($relation) {
            return $this->{$relation};
        });
    }
}
