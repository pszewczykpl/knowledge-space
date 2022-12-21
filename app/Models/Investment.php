<?php

namespace App\Models;

use App\Casts\CacheRelation;
use App\Traits\HasDatatables;
use App\Traits\UsesCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

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
 * @property mixed extended_name
 * @property mixed files
 * @property mixed notes
 * @property mixed funds
 */
class Investment extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasDatatables;
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
            'dist_short' => 'Kod dystrybutora',
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
//        'files' => CacheRelation::class,
//        'notes' => CacheRelation::class,
//        'funds' => CacheRelation::class,
//        'events' => CacheRelation::class,
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
     * Get the user that created the investment.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return array|mixed
     */
    public function history()
    {
        return Cache::tags($this->cacheTag())->remember($this->cacheKey() . ":history", now()->addDays(7), function () {
            return Investment::where('code_toil', '=', $this->code_toil)->orderBy('edit_date', 'desc')->get();
        });
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

}