<?php

namespace App\Models;

use App\Events\AttachmentCreated;
use App\Events\AttachmentDeleted;
use App\Events\AttachmentSaved;
use App\Events\AttachmentUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }
}