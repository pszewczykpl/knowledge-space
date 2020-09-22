<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'code_owu',
        'edit_date',
        'status',
    ];

    public function files()
    {
        return $this->morphToMany('App\File', 'fileable')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function notes()
    {
        return $this->morphToMany('App\Note', 'noteable')->withTimestamps();
    }

    public function extended_name()
    {
        return $this->name . ' od ' . $this->edit_date;
    }
}
