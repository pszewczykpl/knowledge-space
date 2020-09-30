<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fund extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'code',
        'name',
        'status',
        'type',
        'currency',
        'cancel_date',
        'start_date',
        'cancel_reason'
    ];

    public function investments()
    {
        return $this->belongsToMany('App\Models\Investment')->withTimestamps();
    }

    public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function extended_name()
    {
        return $this->name . ' (' . $this->code . ')';
    }
}
