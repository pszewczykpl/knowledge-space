<?php

namespace App\Models;

use App\Events\FileCategorySaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'prefix',
    ];

    protected $dispatchesEvents = [
        'updated' => FileCategorySaved::class
    ];

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
