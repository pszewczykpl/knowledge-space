<?php

namespace App\Models;

use App\Traits\HasDatatables;
use App\Traits\UsesCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $name
 * @property string $code_owu
 * @property mixed $edit_date
 * @property string $status
 * @property int $user_id
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $deleted_at
 * @property mixed files
 * @property mixed notes
 */
class Employee extends Model
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
        'code_owu',
        'edit_date',
        'status',
    ];

    /**
     * Define columns and filters for datatables.net plugin.
     */
    static $datatables = [
        'columns' => [
            'name' => 'Nazwa produktu',
            'code_owu' => 'Kod OWU',
            'edit_date' => 'Ostatnia aktualizacja',
            'actions' => 'Akcje',
            'id' => 'ID',
            'status' => 'Status'
        ],
        'where' => [['status', '=', 'A']],
        'orderBy' => ['code_owu', 'desc']
    ];

    /**
     * Get all of the files for the employee.
     */
    public function files()
    {
        return $this->morphToMany('App\Models\File', 'fileable')->withTimestamps();
    }

    public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }

    /**
     * Get the user that created the employee.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function history()
    {
        return Cache::tags($this->cacheTag())->remember($this->cacheKey() . ":history", now()->addDays(7), function () {
            return Employee::where('name', '=', $this->name)
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
