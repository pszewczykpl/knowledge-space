<?php

namespace App\Models;

use App\Traits\CacheModels;
use App\Traits\HasDatatables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $name
 * @property string|null $number_rau
 * @property string $code
 * @property string|null $nip
 * @property string|null $regon
 * @property string|null $type
 * @property int $user_id
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $deleted_at
 */
class Partner extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CacheModels;
    use HasDatatables;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'number_rau',
        'code',
        'nip',
        'regon',
        'type'
    ];

    static $datatables = [
        'columns' => [
            'name' => 'Nazwa',
            'code' => 'Symbol',
            'type' => 'Kategoria',
            'number_rau' => 'Numer RAU/P',
            'nip' => 'NIP',
            'regon' => 'REGON',
            'actions' => 'Akcje',
            'id' => 'ID',
        ],
        'orderBy' => ['code', 'asc']
    ];

    public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }

    /**
     * Get notes attribute value from cached data.
     *
     * @return mixed
     */
    public function getNotesAttribute()
    {
        return $this->getCachedRelation('notes');
    }

    /**
     * Get all of the partner's events.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Get events attribute value from cached data.
     *
     * @return mixed
     */
    public function getEventsAttribute()
    {
        return $this->getCachedRelation('events');
    }

    /**
     * Get the user that created the partner.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get user attribute value from cached data.
     *
     * @return mixed
     */
    public function getUserAttribute()
    {
        return $this->getCachedRelation('user');
    }

    /**
     * Get unique name of the product.
     *
     * @return string
     */
    public function getExtendedNameAttribute(): string
    {
        return $this->attributes['name'] . ' (' . $this->attributes['code'] . ')';
    }

}
