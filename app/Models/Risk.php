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
 * @property string $code
 * @property string $name
 * @property string $category
 * @property int $group
 * @property string $grace_period
 * @property int $user_id
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $deleted_at
 */
class Risk extends Model
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
        'code',
        'name',
        'category',
        'group',
        'grace_period',
    ];

    static $datatables = [
        'columns' => [
            'code' => 'Symbol',
            'name' => 'Nazwa',
            'category' => 'Kategoria',
            'group' => 'Grupa',
            'grace_period' => 'Okres karencji',
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
     * Get all of the risk's events.
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
     * Get the user that created the risk.
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
        return $this->attributes['name'];
    }

}
