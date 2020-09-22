<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'group',
        'name',
        'code',
        'dist_short',
        'dist',
        'code_owu',
        'code_toil',
        'edit_date',
        'type',
        'status',
    ];

    public function files()
    {
        return $this->morphToMany('App\File', 'fileable')->withTimestamps();
    }

    public function notes()
    {
        return $this->morphToMany('App\Note', 'noteable')->withTimestamps();
    }
    
    public function funds()
    {
        return $this->belongsToMany('App\Fund')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function extended_name()
    {
        return $this->name . ' (' . $this->dist_short . ') od ' . $this->edit_date;
    }
}