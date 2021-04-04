<?php

namespace App\Models;

use App\Events\ReplyUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'content',
    ];

    protected $dispatchesEvents = [
        'updated' => ReplyUpdated::class
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function news()
    {
        return $this->belongsTo('App\Models\News');
    }
}
