<?php

namespace App\Models;

use App\Traits\HasDatatables;
use App\Traits\UsesCache;
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
 * @property mixed files
 * @property mixed notes
 * @method static find($id)
 */
class Bancassurance extends Model
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
        'name',
        'code',
        'dist_short',
        'dist',
        'code_owu',
        'subscription',
        'edit_date',
        'status',
    ];

    /**
     * Define columns and filters for datatables.net plugin.
     */
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
     * Get all of the notes for the bancassurance.
     *
     * @return MorphToMany
     */
    public function notes(): MorphToMany
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }

    /**
     * Get the user that created the bancassurance.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return array|mixed
     */
    public function history()
    {
        return Cache::tags($this->cacheTag())->remember($this->cacheKey() . ":history", now()->addDays(7), function () {
            return Bancassurance::where('code', '=', $this->code)
                ->where('dist_short', '=', $this->dist_short)
                ->where('code_owu', '=', $this->code_owu)
                ->orderBy('edit_date', 'desc')->get();
        });
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
}
