<?php

namespace App\Models;

use App\Events\PostUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'content',
    ];

    protected $dispatchesEvents = [
        'updated' => PostUpdated::class
    ];

    public function post_category()
    {
        return $this->belongsTo('App\Models\PostCategory');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }
}
