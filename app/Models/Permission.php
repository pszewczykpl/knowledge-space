<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Permission extends Model
{
    use HasFactory;
        
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
        return $this->belongsToMany('App\Models\User', 'user_permission')->withTimestamps();
    }

    public function get_cached_relation(string $relation)
    {
        return Cache::tags(['permission', $relation, 'users'])->rememberForever('permissions_' . $this->id . '_' . $relation .'_user_get', function () use ($relation) {
            return $this->{$relation}()->with('user')->get();
        });
    }

}
