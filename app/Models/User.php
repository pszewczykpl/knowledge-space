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

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    /**
     * Set department attribute value from cached data.
     *
     * @return mixed
     */
    public function getDepartmentAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('department')) {
            return $this->getRelationValue('department');
        }
    
        $department = Cache::tags(['users', 'departments'])->rememberForever('users_' . $this->id . '_department', function () {
            return $this->getRelationValue('department');
        });
        $this->setRelation('department', $department);

        return $department;
    }

    /**
     * Get all of the attachments created by the user.
     */
    public function attachments()
    {
        return $this->hasMany('App\Models\Attachment');
    }

    /**
     * Set attachments attribute value from cached data.
     *
     * @return mixed
     */
    public function getAttachmentsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('attachments')) {
            return $this->getRelationValue('attachments');
        }
    
        $attachments = Cache::tags(['users', 'attachments'])->rememberForever('users_' . $this->id . '_attachments', function () {
            return $this->getRelationValue('attachments');
        });
        $this->setRelation('attachments', $attachments);

        return $attachments;
    }

    /**
     * Get all of the departments created by the user.
     */
    public function departments()
    {
        return $this->hasMany('App\Models\Department');
    }

    /**
     * Set departments attribute value from cached data.
     *
     * @return mixed
     */
    public function getDepartmentsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('departments')) {
            return $this->getRelationValue('departments');
        }
    
        $departments = Cache::tags(['users', 'departments'])->rememberForever('users_' . $this->id . '_departments', function () {
            return $this->getRelationValue('departments');
        });
        $this->setRelation('departments', $departments);

        return $departments;
    }

    /**
     * Get all of the employees created by the user.
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }

    /**
     * Set employees attribute value from cached data.
     *
     * @return mixed
     */
    public function getEmployeesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('employees')) {
            return $this->getRelationValue('employees');
        }
    
        $employees = Cache::tags(['users', 'employees'])->rememberForever('users_' . $this->id . '_employees', function () {
            return $this->getRelationValue('employees');
        });
        $this->setRelation('employees', $employees);

        return $employees;
    }

    /**
     * Get all of the files created by the user.
     */
    public function files()
    {
        return $this->hasMany('App\Models\File');
    }

    /**
     * Set files attribute value from cached data.
     *
     * @return mixed
     */
    public function getFilesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('files')) {
            return $this->getRelationValue('files');
        }
    
        $files = Cache::tags(['users', 'files'])->rememberForever('users_' . $this->id . '_files', function () {
            return $this->getRelationValue('files');
        });
        $this->setRelation('files', $files);

        return $files;
    }

    /**
     * Get all of the file categories created by the user.
     */
    public function fileCategories()
    {
        return $this->hasMany('App\Models\FileCategory');
    }

    /**
     * Set fileCategories attribute value from cached data.
     *
     * @return mixed
     */
    public function getFileCategoriesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('fileCategories')) {
            return $this->getRelationValue('fileCategories');
        }
    
        $fileCategories = Cache::tags(['users', 'file_categories'])->rememberForever('users_' . $this->id . '_file_categories', function () {
            return $this->getRelationValue('fileCategories');
        });
        $this->setRelation('fileCategories', $fileCategories);

        return $fileCategories;
    }

    /**
     * Get all of the funds created by the user.
     */
    public function funds()
    {
        return $this->hasMany('App\Models\Fund');
    }

    /**
     * Set funds attribute value from cached data.
     *
     * @return mixed
     */
    public function getFundsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('funds')) {
            return $this->getRelationValue('funds');
        }
    
        $funds = Cache::tags(['users', 'funds'])->rememberForever('users_' . $this->id . '_funds', function () {
            return $this->getRelationValue('funds');
        });
        $this->setRelation('funds', $funds);

        return $funds;
    }

    /**
     * Get all of the investments created by the user.
     */
    public function investments()
    {
        return $this->hasMany('App\Models\Investment');
    }

    /**
     * Set investments attribute value from cached data.
     *
     * @return mixed
     */
    public function getInvestmentsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('investments')) {
            return $this->getRelationValue('investments');
        }
    
        $investments = Cache::tags(['users', 'investments'])->rememberForever('users_' . $this->id . '_investments', function () {
            return $this->getRelationValue('investments');
        });
        $this->setRelation('investments', $investments);

        return $investments;
    }

    /**
     * Get all of the news created by the user.
     */
    public function news()
    {
        return $this->hasMany('App\Models\News');
    }

    /**
     * Set news attribute value from cached data.
     *
     * @return mixed
     */
    public function getNewsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('news')) {
            return $this->getRelationValue('news');
        }
    
        $news = Cache::tags(['users', 'news'])->rememberForever('users_' . $this->id . '_news', function () {
            return $this->getRelationValue('news');
        });
        $this->setRelation('news', $news);

        return $news;
    }

    /**
     * Get all of the notes created by the user.
     */
    public function notes()
    {
        return $this->hasMany('App\Models\Note');
    }

    /**
     * Set notes attribute value from cached data.
     *
     * @return mixed
     */
    public function getNotesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('notes')) {
            return $this->getRelationValue('notes');
        }
    
        $notes = Cache::tags(['users', 'notes'])->rememberForever('users_' . $this->id . '_notes', function () {
            return $this->getRelationValue('notes');
        });
        $this->setRelation('notes', $notes);
        
        return $notes;
    }

    /**
     * Get all of the partners created by the user.
     */
    public function partners()
    {
        return $this->hasMany('App\Models\Partner');
    }

    /**
     * Set partners attribute value from cached data.
     *
     * @return mixed
     */
    public function getPartnersAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('partners')) {
            return $this->getRelationValue('partners');
        }
    
        $partners = Cache::tags(['users', 'partners'])->rememberForever('users_' . $this->id . '_partners', function () {
            return $this->getRelationValue('partners');
        });
        $this->setRelation('partners', $partners);

        return $partners;
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'user_permission')->withTimestamps();
    }

    /**
     * Set permissions attribute value from cached data.
     *
     * @return mixed
     */
    public function getPermissionsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('permissions')) {
            return $this->getRelationValue('permissions');
        }
    
        $permissions = Cache::tags(['users', 'permissions'])->rememberForever('users_' . $this->id . '_permissions', function () {
            return $this->getRelationValue('permissions');
        });
        $this->setRelation('permissions', $permissions);

        return $permissions;
    }

    /**
     * Get all of the protectives created by the user.
     */
    public function protectives()
    {
        return $this->hasMany('App\Models\Protective');
    }

    /**
     * Set protectives attribute value from cached data.
     *
     * @return mixed
     */
    public function getProtectivesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('protectives')) {
            return $this->getRelationValue('protectives');
        }
    
        $protectives = Cache::tags(['users', 'protectives'])->rememberForever('users_' . $this->id . '_protectives', function () {
            return $this->getRelationValue('protectives');
        });
        $this->setRelation('protectives', $protectives);

        return $protectives;
    }
    
    /**
     * Get all of the bancassurances created by the user.
     */
    public function bancassurances()
    {
        return $this->hasMany('App\Models\Bancassurance');
    }

    /**
     * Set bancassurances attribute value from cached data.
     *
     * @return mixed
     */
    public function getBancassurancesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('bancassurances')) {
            return $this->getRelationValue('bancassurances');
        }
    
        $bancassurances = Cache::tags(['users', 'bancassurances'])->rememberForever('users_' . $this->id . '_bancassurances', function () {
            return $this->getRelationValue('bancassurances');
        });
        $this->setRelation('bancassurances', $bancassurances);

        return $bancassurances;
    }

    /**
     * Get all of the replies created by the user.
     */
    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }

    /**
     * Set replies attribute value from cached data.
     *
     * @return mixed
     */
    public function getRepliesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('replies')) {
            return $this->getRelationValue('replies');
        }
    
        $replies = Cache::tags(['users', 'replies'])->rememberForever('users_' . $this->id . '_replies', function () {
            return $this->getRelationValue('replies');
        });
        $this->setRelation('replies', $replies);

        return $replies;
    }

    /**
     * Get all of the risks created by the user.
     */
    public function risks()
    {
        return $this->hasMany('App\Models\Risk');
    }

    /**
     * Set risks attribute value from cached data.
     *
     * @return mixed
     */
    public function getRisksAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('risks')) {
            return $this->getRelationValue('risks');
        }
    
        $risks = Cache::tags(['users', 'risks'])->rememberForever('users_' . $this->id . '_risks', function () {
            return $this->getRelationValue('risks');
        });
        $this->setRelation('risks', $risks);

        return $risks;
    }

    /**
     * Get all of the systems created by the user.
     */
    public function systems()
    {
        return $this->hasMany('App\Models\System');
    }

    /**
     * Set systems attribute value from cached data.
     *
     * @return mixed
     */
    public function getSystemsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('systems')) {
            return $this->getRelationValue('systems');
        }
    
        $systems = Cache::tags(['users', 'systems'])->rememberForever('users_' . $this->id . '_systems', function () {
            return $this->getRelationValue('systems');
        });
        $this->setRelation('systems', $systems);

        return $systems;
    }

    /**
     * Get all of the posts created by the user.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * Set posts attribute value from cached data.
     *
     * @return mixed
     */
    public function getPostsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('posts')) {
            return $this->getRelationValue('posts');
        }
    
        $posts = Cache::tags(['users', 'posts'])->rememberForever('users_' . $this->id . '_posts', function () {
            return $this->getRelationValue('posts');
        });
        $this->setRelation('posts', $posts);

        return $posts;
    }

    /**
     * Get all of the post categories created by the user.
     */
    public function postCategories()
    {
        return $this->hasMany('App\Models\PostCategory');
    }

    /**
     * Set postCategories attribute value from cached data.
     *
     * @return mixed
     */
    public function getPostCategoriesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('postCategories')) {
            return $this->getRelationValue('postCategories');
        }
    
        $postCategories = Cache::tags(['users', 'post_categories'])->rememberForever('users_' . $this->id . '_post_categories', function () {
            return $this->getRelationValue('postCategories');
        });
        $this->setRelation('postCategories', $postCategories);

        return $postCategories;
    }

    /**
     * Get all of the user's events.
     */
    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    /**
     * Set events attribute value from cached data.
     *
     * @return mixed
     */
    public function getEventsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('events')) {
            return $this->getRelationValue('events');
        }
    
        $events = Cache::tags(['users', 'events'])->rememberForever('users_' . $this->id . '_events', function () {
            return $this->getRelationValue('events');
        });
        $this->setRelation('events', $events);

        return $events;
    }

    public function eventable()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    public function hasPermission($code)
    {
        $permissions = Cache::tags(['users', 'permissions'])->rememberForever('users_' . $this->id . '_permissions_all', function () {
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

}