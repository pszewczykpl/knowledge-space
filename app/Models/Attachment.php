<?php

namespace App\Models;

use App\Events\AttachmentCreated;
use App\Events\AttachmentDeleted;
use App\Events\AttachmentSaved;
use App\Events\AttachmentUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Attachment extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'path',
        'name',
        'extension',
    ];

    public function attachmentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Get cached relation.
     *
     * @param string $relation
     * @return array|mixed
     */
    public function getCachedRelation(string $relation)
    {
        return Cache::tags(['attachments', $relation])->rememberForever('attachments_' . $this->id . '_' . $relation, function () use ($relation) {
            return $this->{$relation};
        });
    }
}