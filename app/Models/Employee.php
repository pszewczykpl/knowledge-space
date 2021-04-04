<?php

namespace App\Models;

use App\Events\EmployeeSaved;
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
        'saved' => EmployeeSaved::class
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

    public function extended_name()
    {
        return $this->name . ' od ' . $this->edit_date;
    }

    public function get_files()
    {
        return Cache::tags(['employee', 'files', 'users'])->rememberForever('employees_' . $this->id . '_files_all', function () {
            return $this->files()->with('user')->get();
        });
    }

    public function get_notes()
    {
        return Cache::tags(['employee', 'notes', 'users'])->rememberForever('employees_' . $this->id . '_notes_all', function () {
            return $this->notes()->with('user')->get();
        });
    }
}
