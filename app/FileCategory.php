<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileCategory extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name'
    ];

    public function files()
    {
        return $this->hasMany('App\File');
    }
}
