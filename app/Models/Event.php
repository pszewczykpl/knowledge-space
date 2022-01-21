<?php

namespace App\Models;

use App\Traits\UsesCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $event
 * @property string $eventable_type
 * @property int $eventable_id
 * @property int|null $user_id
 * @property bool $visible
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $deleted_at
 */
class Event extends Model
{
    use HasFactory;
    use UsesCache;

    /**
     * Set default with() method in query.
     *
     * @var string[]
     */
    public $with = ['user'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event'
    ];

    public function eventable()
    {
        return $this->morphTo();
    }

    /**
     * Get the user that performed the actions.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
