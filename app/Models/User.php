<?php

namespace App\Models;

use App\Traits\CacheModels;
use App\Traits\HasDatatables;
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
    use CacheModels;
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
        'password',
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
    ];

    /**
     * Get the department that owns the user.
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    /**
     * Get department attribute value from cached data.
     */
    public function getDepartmentAttribute()
    {
        return $this->getCachedRelation('department');
    }

    /**
     * Get all of the attachments created by the user.
     */
    public function attachments()
    {
        return $this->hasMany('App\Models\Attachment');
    }

    /**
     * Get attachments attribute value from cached data.
     */
    public function getAttachmentsAttribute()
    {
        return $this->getCachedRelation('attachments');
    }

    /**
     * Get all of the departments created by the user.
     */
    public function departments()
    {
        return $this->hasMany('App\Models\Department');
    }

    /**
     * Get departments attribute value from cached data.
     */
    public function getDepartmentsAttribute()
    {
        return $this->getCachedRelation('departments');
    }

    /**
     * Get all of the employees created by the user.
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }

    /**
     * Get employees attribute value from cached data.
     */
    public function getEmployeesAttribute()
    {
        return $this->getCachedRelation('employees');
    }

    /**
     * Get all of the files created by the user.
     */
    public function files()
    {
        return $this->hasMany('App\Models\File');
    }

    /**
     * Get files attribute value from cached data.
     */
    public function getFilesAttribute()
    {
        return $this->getCachedRelation('files');
    }

    /**
     * Get all of the file categories created by the user.
     */
    public function fileCategories()
    {
        return $this->hasMany('App\Models\FileCategory');
    }

    /**
     * Get fileCategories attribute value from cached data.
     */
    public function getFileCategoriesAttribute()
    {
        return $this->getCachedRelation('fileCategories');
    }

    /**
     * Get all of the funds created by the user.
     */
    public function funds()
    {
        return $this->hasMany('App\Models\Fund');
    }

    /**
     * Get funds attribute value from cached data.
     */
    public function getFundsAttribute()
    {
        return $this->getCachedRelation('funds');
    }

    /**
     * Get all of the investments created by the user.
     */
    public function investments()
    {
        return $this->hasMany('App\Models\Investment');
    }

    /**
     * Get investments attribute value from cached data.
     */
    public function getInvestmentsAttribute()
    {
        return $this->getCachedRelation('investments');
    }

    /**
     * Get all of the news created by the user.
     */
    public function news()
    {
        return $this->hasMany('App\Models\News');
    }

    /**
     * Get news attribute value from cached data.
     */
    public function getNewsAttribute()
    {
        return $this->getCachedRelation('news');
    }

    /**
     * Get all of the notes created by the user.
     */
    public function notes()
    {
        return $this->hasMany('App\Models\Note');
    }

    /**
     * Get notes attribute value from cached data.
     */
    public function getNotesAttribute()
    {
        return $this->getCachedRelation('notes');
    }

    /**
     * Get all of the partners created by the user.
     */
    public function partners()
    {
        return $this->hasMany('App\Models\Partner');
    }

    /**
     * Get partners attribute value from cached data.
     */
    public function getPartnersAttribute()
    {
        return $this->getCachedRelation('partners');
    }

    /**
     * The permissions that belong to the user.
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'user_permission')->withTimestamps();
    }

    /**
     * Get permissions attribute value from cached data.
     */
    public function getPermissionsAttribute()
    {
        return $this->getCachedRelation('permissions');
    }

    /**
     * Get all of the protectives created by the user.
     */
    public function protectives()
    {
        return $this->hasMany('App\Models\Protective');
    }

    /**
     * Get protectives attribute value from cached data.
     */
    public function getProtectivesAttribute()
    {
        return $this->getCachedRelation('protectives');
    }
    
    /**
     * Get all of the bancassurances created by the user.
     */
    public function bancassurances()
    {
        return $this->hasMany('App\Models\Bancassurance');
    }

    /**
     * Get bancassurances attribute value from cached data.
     */
    public function getBancassurancesAttribute()
    {
        return $this->getCachedRelation('bancassurances');
    }

    /**
     * Get all of the replies created by the user.
     */
    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }

    /**
     * Get replies attribute value from cached data.
     */
    public function getRepliesAttribute()
    {
        return $this->getCachedRelation('replies');
    }

    /**
     * Get all of the risks created by the user.
     */
    public function risks()
    {
        return $this->hasMany('App\Models\Risk');
    }

    /**
     * Get risks attribute value from cached data.
     */
    public function getRisksAttribute()
    {
        return $this->getCachedRelation('risks');
    }

    /**
     * Get all of the systems created by the user.
     */
    public function systems()
    {
        return $this->hasMany('App\Models\System');
    }

    /**
     * Get systems attribute value from cached data.
     */
    public function getSystemsAttribute()
    {
        return $this->getCachedRelation('systems');
    }

    /**
     * Get all of the posts created by the user.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * Get posts attribute value from cached data.
     */
    public function getPostsAttribute()
    {
        return $this->getCachedRelation('posts');
    }

    /**
     * Get all of the post categories created by the user.
     */
    public function postCategories()
    {
        return $this->hasMany('App\Models\PostCategory');
    }

    /**
     * Get postCategories attribute value from cached data.
     */
    public function getPostCategoriesAttribute()
    {
        return $this->getCachedRelation('postCategories');
    }

    /**
     * Get all of the user's events.
     */
    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    /**
     * Get events attribute value from cached data.
     */
    public function getEventsAttribute()
    {
        return $this->getCachedRelation('events');
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

}