<?php

namespace App\Models;

use App\Casts\CacheRelation;
use App\Traits\HasDatatables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @property int        $id
 * @property string     $group
 * @property string     $name
 * @property int        $code
 * @property string     $dist_short
 * @property string     $dist
 * @property string     $code_owu
 * @property string     $code_toil
 * @property mixed      $edit_date
 * @property string     $type
 * @property string     $status
 * @property int        $user_id
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $deleted_at
 */
class Investment extends Model
{
    use HasFactory;
    use SoftDeletes;
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

    public static array $datatables = [
        'columns' => [
            'name' => 'Nazwa produktu',
            'code_toil' => 'Kod TOiL',
            'code' => 'Kod produktu',
            'group' => 'Grupa produktowa',
            'edit_date' => 'Ostatnia aktualizacja',
            'actions' => 'Akcje',
            'id' => 'ID',
            'status' => 'Status',
            'dist' => 'Nazwa dystrybutora',
            'dist_code' => 'Kod dystrybutora',
            'code_owu' => 'Kod OWU',
            'type' => 'Typ produktu'
        ],
        'where' => [['status', '=', 'A']],
        'orderBy' => ['code', 'desc']
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'files' => CacheRelation::class,
        'notes' => CacheRelation::class,
        'funds' => CacheRelation::class,
        'events' => CacheRelation::class,
    ];

    /**
     * Get all of the files for the investment.
     */
    public function files()
    {
        return $this->morphToMany('App\Models\File', 'fileable')->withTimestamps();
    }

    /**
     * Get all of the notes for the investment.
     */
    public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }

    /**
     * Get the funds that belong to the investment.
     */
    public function funds()
    {
        return $this->belongsToMany('App\Models\Fund')->withTimestamps();
    }

    /**
     * Get all of the investment's events.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Get the user that created the investment.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get unique name of the product.
     *
     * @return string
     */
    public function getExtendedNameAttribute(): string
    {
        return $this->attributes['name'] . ' (' . $this->attributes['code_toil'] . ')';
    }

    /**
     * Get record status (up to date or not).
     *
     * @return string
     */
    public function getStatusAttribute($value): string
    {
        return match ($value) {
            'A' => 'Aktualny',
            'N' => 'Archiwalny',
            default => $this->attributes['status'],
        };
    }

    /**
     * Get record type.
     *
     * @return string
     */
    public function getTypeAttribute(): string
    {
        return match ($this->attributes['type']) {
            'I' => 'Indywidualny',
            'G' => 'Grupowy',
            default => $this->attributes['type'],
        };
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return Model|null
     */
//    public function resolveRouteBinding($value, $field = null)
//    {
//        $data = Cache::remember("investments:$value", 60*60*12, function () use ($value, $field) {
//                return self::withoutEvents(function () use ($value, $field) {
//                    return parent::resolveRouteBinding($value, $field);
//                });
//            });
//        event("eloquent.retrieved: \App\Models\Investment", $data);
//
//        return $data;
//    }
//
//    public function resolveSoftDeletableRouteBinding($value, $field = null) {
//        $data = Cache::remember("investments:$value", 60*60*12, function () use ($value, $field) {
//            return Investment::withoutEvents(function () use ($value, $field) {
//                return parent::resolveSoftDeletableRouteBinding($value, $field);
//            });
//        });
//        event("eloquent.retrieved: \App\Models\Investment", $data);
//
//        return $data;
//    }

}