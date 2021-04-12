<?php

namespace App\Models;

use App\Events\PartnerCreated;
use App\Events\PartnerDeleted;
use App\Events\PartnerSaved;
use App\Events\PartnerUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Partner extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'number_rau',
        'code',
        'nip',
        'regon',
        'type'
    ];

    protected $dispatchesEvents = [
        'saved' => PartnerSaved::class,
        'created' => PartnerCreated::class,
        'updated' => PartnerUpdated::class,
        'deleted' => PartnerDeleted::class,
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    public function get_cached_relation(string $relation)
    {
        return Cache::tags(['partner', $relation, 'users'])->rememberForever('partners_' . $this->id . '_' . $relation .'_user_get', function () use ($relation) {
            return $this->{$relation}()->with('user')->get();
        });
    }
}
