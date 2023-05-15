<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'department_id',
        'avatar_path',
        'position',
        'description',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function files(): HasMany
    {
        return $this->hasMany(File::class, 'created_by');
    }

    public function funds(): HasMany
    {
        return $this->hasMany(Fund::class, 'created_by');
    }

    public function risks(): HasMany
    {
        return $this->hasMany(Risk::class, 'created_by');
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class, 'created_by');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'created_by');
    }

    public function fileCategories(): HasMany
    {
        return $this->hasMany(FileCategory::class, 'created_by');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'created_by');
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }
}
