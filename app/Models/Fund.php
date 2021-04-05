<?php

namespace App\Models;

use App\Events\FundCreated;
use App\Events\FundDeleted;
use App\Events\FundSaved;
use App\Events\FundUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

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

    protected $dispatchesEvents = [
        'saved' => FundSaved::class,
        'created' => FundCreated::class,
        'updated' => FundUpdated::class,
        'deleted' => FundDeleted::class,
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

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    public function extended_name()
    {
        return $this->name . ' (' . $this->code . ')';
    }

    public function get_notes()
    {
        return Cache::tags(['fund', 'notes', 'users'])->rememberForever('funds_' . $this->id . '_notes_all', function () {
            return $this->notes()->with('user')->get();
        });
    }
}
