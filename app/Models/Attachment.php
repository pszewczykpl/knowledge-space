<?php

namespace App\Models;

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
        'updated' => AttachmentUpdated::class
    ];

    public function attachmentable()
    {
        return $this->morphTo();
    }
}