<?php

namespace App\Models;

use App\Events\InvestmentSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investment extends Model
{
    use HasFactory;
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

    protected $dispatchesEvents = [
        'updated' => InvestmentSaved::class
    ];

    public function files()
    {
        return $this->morphToMany('App\Models\File', 'fileable')->withTimestamps();
    }

    public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }
    
    public function funds()
    {
        return $this->belongsToMany('App\Models\Fund')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function extended_name()
    {
        return $this->name . ' (' . $this->dist_short . ') od ' . $this->edit_date;
    }

    public function fullname()
    {
        return $this->name . ' (' . $this->code_toil . ') od ' . $this->edit_date;
    }
}