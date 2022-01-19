<?php

namespace App\Models;

use App\Casts\CacheRelation;
use App\Traits\HasDatatables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $email
 * @property string|null $phone
 * @property string $password
 * @property string $company
 * @property int $department_id
 * @property string $position
 * @property string|null $description
 * @property string $location
 * @property string|null $avatar_path
 * @property string|null $remember_token
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $deleted_at
 *
 * @property string $full_name Added using getFullNameAttribute() method
 *
 * @property bool $v_rounded --- TO DELETE ---
 * @property bool $v_aside_toggled --- TO DELETE ---
 * @property bool $v_dark_mode --- TO DELETE ---
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;
    use HasDatatables;

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
        'company',
        'position',
        'description',
        'location',
        'avatar_path'
    ];

    static $datatables = [
        'columns' => [
            'fullname' => 'Imię i Nazwisko',
            'email' => 'E-mail',
            'phone' => 'Telefon',
            'actions' => 'Akcje',
            'id' => 'ID',
            'first_name' => 'Imię',
            'last_name' => 'Nazwisko',
            'username' => 'Login',
            'position' => 'Stanowisko',
        ],
        'orderBy' => ['email', 'asc']
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
        'department' => CacheRelation::class,
        'news' => CacheRelation::class,
    ];

    /**
     * Get the department that owns the user.
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    /**
     * Get all of the departments created by the user.
     */
    public function departments()
    {
        return $this->hasMany('App\Models\Department');
    }

    /**
     * Get all of the employees created by the user.
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }

    /**
     * Get all of the files created by the user.
     */
    public function files()
    {
        return $this->hasMany('App\Models\File');
    }

    /**
     * Get all of the file categories created by the user.
     */
    public function fileCategories()
    {
        return $this->hasMany('App\Models\FileCategory');
    }

    /**
     * Get all of the funds created by the user.
     */
    public function funds()
    {
        return $this->hasMany('App\Models\Fund');
    }

    /**
     * Get all of the investments created by the user.
     */
    public function investments()
    {
        return $this->hasMany('App\Models\Investment');
    }

    /**
     * Get all of the news created by the user.
     */
    public function news()
    {
        return $this->hasMany('App\Models\News');
    }

    /**
     * Get all of the notes created by the user.
     */
    public function notes()
    {
        return $this->hasMany('App\Models\Note');
    }

    /**
     * Get all of the partners created by the user.
     */
    public function partners()
    {
        return $this->hasMany('App\Models\Partner');
    }

    /**
     * The permissions that belong to the user.
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'user_permission')->withTimestamps();
    }

    /**
     * Get all of the protectives created by the user.
     */
    public function protectives()
    {
        return $this->hasMany('App\Models\Protective');
    }
    
    /**
     * Get all of the bancassurances created by the user.
     */
    public function bancassurances()
    {
        return $this->hasMany('App\Models\Bancassurance');
    }

    /**
     * Get all of the replies created by the user.
     */
    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }

    /**
     * Get all of the risks created by the user.
     */
    public function risks()
    {
        return $this->hasMany('App\Models\Risk');
    }

    /**
     * Get all of the systems created by the user.
     */
    public function systems()
    {
        return $this->hasMany('App\Models\System');
    }

    /**
     * Get all of the posts created by the user.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * Get all of the post categories created by the user.
     */
    public function postCategories()
    {
        return $this->hasMany('App\Models\PostCategory');
    }

    /**
     * Get all of the user's events.
     */
    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    /**
     * Get all of the user's events.
     */
    public function eventable()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Check if user has the permission (by code).
     *
     * @param string $code
     * @return bool
     */
    public function hasPermission(string $code): bool
    {
        return in_array($code, $this->permissions->pluck('code')->toArray());
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function profileProgressValue(): int
    {
        $sum = 0;
        foreach($this->fillable as $column) {
            if(! is_null($this->{$column}))
                $sum++;
        }

        return $sum*100/count($this->fillable);
    }

}