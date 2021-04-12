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

    protected $dispatchesEvents = [
        'saved' => AttachmentSaved::class,
        'created' => AttachmentCreated::class,
        'updated' => AttachmentUpdated::class,
        'deleted' => AttachmentDeleted::class,
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

    public function get_cached_relation(string $relation)
    {
        return Cache::tags(['attachment', $relation, 'users'])->rememberForever('attachments_' . $this->id . '_' . $relation .'_user_get', function () use ($relation) {
            return $this->{$relation}()->with('user')->get();
        });
    }
}