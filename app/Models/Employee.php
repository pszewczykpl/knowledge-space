<?php

namespace App\Models;

use App\Events\EmployeeCreated;
use App\Events\EmployeeDeleted;
use App\Events\EmployeeSaved;
use App\Events\EmployeeUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'code_owu',
        'edit_date',
        'status',
    ];

    protected $dispatchesEvents = [
        'saved' => EmployeeSaved::class,
        'created' => EmployeeCreated::class,
        'updated' => EmployeeUpdated::class,
        'deleted' => EmployeeDeleted::class,
    ];

    public function files()
    {
        return $this->morphToMany('App\Models\File', 'fileable')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    public function extended_name()
    {
        return $this->name . ' od ' . $this->edit_date;
    }

    public function get_cached_relation(string $relation)
    {
        return Cache::tags(['employee', $relation, 'users'])->rememberForever('employees_' . $this->id . '_' . $relation .'_user_get', function () use ($relation) {
            return $this->{$relation}()->with('user')->get();
        });
    }
}
