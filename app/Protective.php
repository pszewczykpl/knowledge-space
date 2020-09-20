<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protective extends Model
{
    protected $fillable = [
        'name',
        'code',
        'dist_short',
        'dist',
        'code_owu',
        'subscription',
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
        return $this->name . ' (' . $this->dist_short . ') od ' . $this->edit_date;
    }
}
