<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'description', 
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_permission')->withTimestamps();
    }

}
