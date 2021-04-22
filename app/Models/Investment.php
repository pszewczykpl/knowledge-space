<?php

namespace App\Models;

use App\Events\InvestmentCreated;
use App\Events\InvestmentDeleted;
use App\Events\InvestmentSaved;
use App\Events\InvestmentUpdated;
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

    /**
     * Get all of the files for the investment.
     */
    public function files()
    {
        return $this->morphToMany('App\Models\File', 'fileable')->withTimestamps();
    }

    /**
     * Set files attribute value from cached data.
     *
     * @return mixed
     */
    public function getFilesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('files')) {
            return $this->getRelationValue('files');
        }
    
        $files = Cache::tags(['investments', 'files'])->rememberForever('investments_' . $this->id . '_files', function () {
            return $this->getRelationValue('files');
        });
        $this->setRelation('files', $files);

        return $files;
    }

    /**
     * Get all of the notes for the investment.
     */
    public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }

    /**
     * Set notes attribute value from cached data.
     *
     * @return mixed
     */
    public function getNotesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('notes')) {
            return $this->getRelationValue('notes');
        }
    
        $notes = Cache::tags(['investments', 'notes'])->rememberForever('investments_' . $this->id . '_notes', function () {
            return $this->getRelationValue('notes');
        });
        $this->setRelation('notes', $notes);
        
        return $notes;
    }
    
    /**
     * Get the funds that belong to the investment.
     */
    public function funds()
    {
        return $this->belongsToMany('App\Models\Fund')->withTimestamps();
    }

    /**
     * Set funds attribute value from cached data.
     *
     * @return mixed
     */
    public function getFundsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('funds')) {
            return $this->getRelationValue('funds');
        }
    
        $funds = Cache::tags(['investments', 'funds'])->rememberForever('investments_' . $this->id . '_funds', function () {
            return $this->getRelationValue('funds');
        });
        $this->setRelation('funds', $funds);
        
        return $funds;
    }

    /**
     * Get all of the investment's events.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Set events attribute value from cached data.
     *
     * @return mixed
     */
    public function getEventsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('events')) {
            return $this->getRelationValue('events');
        }
    
        $events = Cache::tags(['investments', 'events'])->rememberForever('investments_' . $this->id . '_events', function () {
            return $this->getRelationValue('events');
        });
        $this->setRelation('events', $events);
        
        return $events;
    }

    public function extended_name()
    {
        return $this->name . ' (' . $this->dist_short . ') od ' . $this->edit_date;
    }

    public function fullname()
    {
        return $this->name . ' (' . $this->code_toil . ') od ' . $this->edit_date;
    }

    /**
     * Get the author that created the investment.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Set user attribute value from cached data.
     *
     * @return mixed
     */
    public function getUserAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('user')) {
            return $this->getRelationValue('user');
        }
    
        $user = Cache::tags(['investments', 'users'])->rememberForever('investments_' . $this->id . '_user', function () {
            return $this->getRelationValue('user');
        });
        $this->setRelation('user', $user);
        
        return $user;
    }

}