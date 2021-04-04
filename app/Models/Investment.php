<?php

namespace App\Models;

use App\Events\InvestmentSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

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
        'saved' => InvestmentSaved::class
    ];

    public function files()
    {
        return $this->morphToMany('App\Models\File', 'fileable')->withTimestamps();
    }

    public function getFiles()
    {
        return Cache::tags(['investment', 'files', 'users'])->rememberForever('investments_' . $this->id . '_files_all', function () {
            return $this->files()->with('user')->get();
        });
    }

    public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }

    public function getNotes()
    {
        return Cache::tags(['investment', 'notes', 'users'])->rememberForever('investments_' . $this->id . '_notes_all', function () {
            return $this->notes()->with('user')->get();
        });
    }
    
    public function funds()
    {
        return $this->belongsToMany('App\Models\Fund')->withTimestamps();
    }

    public function getFunds()
    {
        return Cache::tags(['investment', 'funds', 'users'])->rememberForever('investments_' . $this->id . '_funds_all', function () {
            return $this->funds()->with('user')->get();
        });
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