<?php

namespace App\Models;

use App\Events\EmployeeUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'updated' => EmployeeUpdated::class
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
}
