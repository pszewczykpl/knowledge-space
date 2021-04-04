<?php

namespace App\Models;

use App\Events\PostCategorySaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'description',
    ];

    protected $dispatchesEvents = [
        'updated' => PostCategorySaved::class
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
