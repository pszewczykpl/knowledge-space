<?php

namespace App\Models;

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

    public function attachmentable()
    {
        return $this->morphTo();
    }
}