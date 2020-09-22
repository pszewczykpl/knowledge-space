<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name', 
        'username', 
        'email', 
        'phone', 
        'password', 
        'company', 
        'department_id', 
        'position', 
        'description', 
        'location'
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
        return $this->hasMany('App\Models\Investment');
    }

    public function protectives()
    {
        return $this->hasMany('App\Models\Protective');
    }

    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }

    public function funds()
    {
        return $this->hasMany('App\Models\Fund');
    }

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }

    public function notes()
    {
        return $this->hasMany('App\Models\Note');
    }

    public function news()
    {
        return $this->hasMany('App\Models\News');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'user_permission')->withTimestamps();
    }

    public function partners()
    {
        return $this->hasMany('App\Models\Partner');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function risks()
    {
        return $this->hasMany('App\Models\Risk');
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

    public function fullname()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}