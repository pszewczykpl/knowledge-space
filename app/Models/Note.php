<?php

namespace App\Models;

use App\Events\NoteCreated;
use App\Events\NoteDeleted;
use App\Events\NoteSaved;
use App\Events\NoteUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Note extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'content',
    ];

    public function investments()
    {
        return $this->morphedByMany('App\Models\Investment', 'noteable')->withTimestamps();
    }

    /**
     * Set investments attribute value from cached data.
     *
     * @return mixed
     */
    public function getInvestmentsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('investments')) {
            return $this->getRelationValue('investments');
        }
    
        $investments = Cache::tags(['notes', 'investments'])->rememberForever('notes_' . $this->id . '_investments', function () {
            return $this->getRelationValue('investments');
        });
        $this->setRelation('investments', $investments);

        return $investments;
    }

    public function protectives()
    {
        return $this->morphedByMany('App\Models\Protective', 'noteable')->withTimestamps();
    }

    /**
     * Set protectives attribute value from cached data.
     *
     * @return mixed
     */
    public function getProtectivesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('protectives')) {
            return $this->getRelationValue('protectives');
        }
    
        $protectives = Cache::tags(['notes', 'protectives'])->rememberForever('notes_' . $this->id . '_protectives', function () {
            return $this->getRelationValue('protectives');
        });
        $this->setRelation('protectives', $protectives);

        return $protectives;
    }

    public function bancassurances()
    {
        return $this->morphedByMany('App\Models\Bancassurance', 'noteable')->withTimestamps();
    }

    /**
     * Set bancassurances attribute value from cached data.
     *
     * @return mixed
     */
    public function getBancassurancesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('bancassurances')) {
            return $this->getRelationValue('bancassurances');
        }
    
        $bancassurances = Cache::tags(['notes', 'bancassurances'])->rememberForever('notes_' . $this->id . '_bancassurances', function () {
            return $this->getRelationValue('bancassurances');
        });
        $this->setRelation('bancassurances', $bancassurances);

        return $bancassurances;
    }

    public function employees()
    {
        return $this->morphedByMany('App\Models\Employee', 'noteable')->withTimestamps();
    }

    /**
     * Set employees attribute value from cached data.
     *
     * @return mixed
     */
    public function getEmployeesAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('employees')) {
            return $this->getRelationValue('employees');
        }
    
        $employees = Cache::tags(['notes', 'employees'])->rememberForever('notes_' . $this->id . '_employees', function () {
            return $this->getRelationValue('employees');
        });
        $this->setRelation('employees', $employees);

        return $employees;
    }

    public function funds()
    {
        return $this->morphedByMany('App\Models\Fund', 'noteable')->withTimestamps();
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
    
        $funds = Cache::tags(['notes', 'funds'])->rememberForever('notes_' . $this->id . '_funds', function () {
            return $this->getRelationValue('funds');
        });
        $this->setRelation('funds', $funds);

        return $funds;
    }

    public function partners()
    {
        return $this->morphedByMany('App\Models\Partner', 'noteable')->withTimestamps();
    }

    /**
     * Set partners attribute value from cached data.
     *
     * @return mixed
     */
    public function getPartnersAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('partners')) {
            return $this->getRelationValue('partners');
        }
    
        $partners = Cache::tags(['notes', 'partners'])->rememberForever('notes_' . $this->id . '_partners', function () {
            return $this->getRelationValue('partners');
        });
        $this->setRelation('partners', $partners);

        return $partners;
    }

    public function risks()
    {
        return $this->morphedByMany('App\Models\Risk', 'noteable')->withTimestamps();
    }

    /**
     * Set risks attribute value from cached data.
     *
     * @return mixed
     */
    public function getRisksAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('risks')) {
            return $this->getRelationValue('risks');
        }
    
        $risks = Cache::tags(['notes', 'risks'])->rememberForever('notes_' . $this->id . '_risks', function () {
            return $this->getRelationValue('risks');
        });
        $this->setRelation('risks', $risks);

        return $risks;
    }

    /**
     * Get all of the note's events.
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
    
        $events = Cache::tags(['notes', 'events'])->rememberForever('notes_' . $this->id . '_events', function () {
            return $this->getRelationValue('events');
        });
        $this->setRelation('events', $events);

        return $events;
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    /**
     * Set attachments attribute value from cached data.
     *
     * @return mixed
     */
    public function getAttachmentsAttribute()
    {
        // When relation is loaded, return value
        if ($this->relationLoaded('attachments')) {
            return $this->getRelationValue('attachments');
        }
    
        $attachments = Cache::tags(['notes', 'attachments'])->rememberForever('notes_' . $this->id . '_attachments', function () {
            return $this->getRelationValue('attachments');
        });
        $this->setRelation('attachments', $attachments);

        return $attachments;
    }

    /**
     * Get the author that created the note.
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
    
        $user = Cache::tags(['notes', 'users'])->rememberForever('notes_' . $this->id . '_user', function () {
            return $this->getRelationValue('user');
        });
        $this->setRelation('user', $user);
        
        return $user;
    }

}
