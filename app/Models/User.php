<?php

namespace App\Models;

use App\Events\UserCreated;
use App\Events\UserDeleted;
use App\Events\UserSaved;
use App\Events\UserUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use HasFactory;
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
        'position',
        'description',
        'location',
        'avatar_path'
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

    protected $dispatchesEvents = [
        'saved' => UserSaved::class,
        'created' => UserCreated::class,
        'updated' => UserUpdated::class,
        'deleted' => UserDeleted::class,
    ];

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function departments()
    {
        return $this->hasMany('App\Models\Department');
    }

    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }

    public function file_categories()
    {
        return $this->hasMany('App\Models\FileCategory');
    }

    public function funds()
    {
        return $this->hasMany('App\Models\Fund');
    }

    public function investments()
    {
        return $this->hasMany('App\Models\Investment');
    }

    public function news()
    {
        return $this->hasMany('App\Models\News');
    }

    public function notes()
    {
        return $this->hasMany('App\Models\Note');
    }

    public function partners()
    {
        return $this->hasMany('App\Models\Partner');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'user_permission')->withTimestamps();
    }

    public function protectives()
    {
        return $this->hasMany('App\Models\Protective');
    }
    
    public function bancassurances()
    {
        return $this->hasMany('App\Models\Bancassurance');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }

    public function risks()
    {
        return $this->hasMany('App\Models\Risk');
    }

    public function systems()
    {
        return $this->hasMany('App\Models\System');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function post_categories()
    {
        return $this->hasMany('App\Models\PostCategory');
    }

    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    public function attachments()
    {
        return $this->hasMany('App\Models\Attachment');
    }

    public function hasPermission($code)
    {
        $permissions = Cache::tags(['user', 'permissions'])->rememberForever('users_' . $this->id . '_permissions_all', function () {
            return $this->permissions()->get()->pluck('code')->toArray();
        });

        if (in_array($code, $permissions)) {
            return true;
        }

        return false;
    }

    public function fullname()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function get_cached_relation(string $relation)
    {
        return Cache::tags(['user', $relation, 'users'])->rememberForever('users_' . $this->id . '_' . $relation .'_user_get', function () use ($relation) {
            return $this->{$relation}()->with('user')->get();
        });
    }
}