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

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Get the author that created the attachment.
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
    
        $user = Cache::tags(['attachments', 'users'])->rememberForever('attachments_' . $this->id . '_user', function () {
            return $this->getRelationValue('user');
        });
        $this->setRelation('user', $user);
        
        return $user;
    }

}