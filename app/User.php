<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'phone', 'password', 'company', 'department', 'position', 'description', 'location'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function investments()
    {
        return $this->hasMany('App\Investment');
    }

    public function protectives()
    {
        return $this->hasMany('App\Protective');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function funds()
    {
        return $this->hasMany('App\Fund');
    }

    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function notes()
    {
        return $this->hasMany('App\Note');
    }

    public function news()
    {
        return $this->hasMany('App\News');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'user_permission')->withTimestamps();
    }

    public function hasPermission($code)
    {
        foreach ($this->permissions()->get() as $role)
        {
            if ($role->code == $code)
            {
                return true;
            }
        }

        return false;
    }
}