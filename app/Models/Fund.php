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
 * @property string $code
 * @property string $name
 * @property string $status
 * @property string $type
 * @property string $currency
 * @property mixed|null $cancel_date
 * @property mixed|null $start_date
 * @property string|null $cancel_reason
 * @property int $user_id
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $deleted_at
 */
class Fund extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasDatatables;
    use UsesCache;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'status',
        'type',
        'currency',
        'cancel_date',
        'start_date',
        'cancel_reason'
    ];

    static $datatables = [
        'columns' => [
            'code' => 'Symbol',
            'name' => 'Nazwa',
            'type' => 'Typ',
            'start_date' => 'Data startu',
            'actions' => 'Akcje',
            'currency' => 'Waluta',
            'id' => 'ID',
            'status' => 'Status'
        ],
        'where' => [['status', '=', 'A']],
        'orderBy' => ['start_date', 'desc']
    ];

    public function investments()
    {
        return $this->belongsToMany('App\Models\Investment')->withTimestamps();
    }

    public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }

    /**
     * Get all of the fund's events.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
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

    public function getTypeAttribute()
    {
        return match ($this->attributes['type']) {
            'Z' => 'Inwestycyjny',
            'M' => 'Modelowy',
            'U' => 'UFK',
            'S' => 'SOK',
            'T' => 'Tracker',
            'D' => 'Depozytowy',
            default => $this->attributes['type'],
        };
    }

    /**
     * Get record status (up to date or not).
     *
     * @return string
     */
    public function getStatusAttribute(): string
    {
        return match ($this->attributes['status']) {
            'A' => 'Aktywny',
            'N' => 'Nieaktywny',
            default => $this->attributes['status'],
        };
    }

    /**
     * Get the user that created the fund.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
