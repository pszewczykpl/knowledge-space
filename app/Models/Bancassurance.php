<?php

namespace App\Models;

use App\Traits\CacheModels;
use App\Traits\HasDatatables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $name
 * @property int $code
 * @property string $dist_short
 * @property string $dist
 * @property string $code_owu
 * @property int $subscription
 * @property mixed $edit_date
 * @property string $status
 * @property int $user_id
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $deleted_at
 * @method static find($id)
 */
class Bancassurance extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CacheModels;
    use HasDatatables;

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
        'name',
        'code',
        'dist_short',
        'dist',
        'code_owu',
        'subscription',
        'edit_date',
        'status',
    ];

    static $datatables = [
        'columns' => [
            'name' => 'Nazwa produktu',
            'dist_short' => 'Nazwa dystrybutora',
            'code' => 'Kod produktu',
            'code_owu' => 'Kod OWU',
            'edit_date' => 'Ostatnia aktualizacja',
            'actions' => 'Akcje',
            'id' => 'ID',
            'status' => 'Status',
            'dist' => 'Nazwa dystrybutora',
            'subscription' => 'Subskrypcja'
        ],
        'where' => [['status', '=', 'A']],
        'orderBy' => ['code', 'desc']
    ];

    /**
     * Get all the files for the bancassurance.
     *
     * @return MorphToMany
     */
    public function files(): MorphToMany
    {
        return $this->morphToMany('App\Models\File', 'fileable')->withTimestamps();
    }

    /**
     * Get files attribute value from cached data.
     */
    public function getFilesAttribute()
    {
        return $this->getCachedRelation('files');
    }

    /**
     * Get all of the notes for the bancassurance.
     *
     * @return MorphToMany
     */
    public function notes(): MorphToMany
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }

    /**
     * Get notes attribute value from cached data.
     */
    public function getNotesAttribute()
    {
        return $this->getCachedRelation('notes');
    }

    /**
     * Get all of the bancassurance's events.
     */
    public function events()
    {
        return $this->morphMany('App\Models\Event', 'eventable')->withTimestamps();
    }

    /**
     * Get events attribute value from cached data.
     */
    public function getEventsAttribute()
    {
        return $this->getCachedRelation('events');
    }

    /**
     * Get unique name of the product.
     *
     * @return string
     */
    public function getExtendedNameAttribute(): string
    {
        return $this->attributes['name'] . ' (' . $this->attributes['code_owu'] . ')';
    }

    /**
     * Get record status (up to date or not).
     *
     * @return string
     */
    public function getStatusAttribute(): string
    {
        return match ($this->attributes['status']) {
            'A' => 'Aktualny',
            'N' => 'Archiwalny',
            default => $this->attributes['status'],
        };
    }

    /**
     * Get the user that created the bancassurance.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get user attribute value from cached data.
     */
    public function getUserAttribute()
    {
        return $this->getCachedRelation('user');
    }

}
