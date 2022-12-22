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
 * @property string $code
 * @property string $description
 * @property int|null $user_id
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $deleted_at
 */
class Department extends Model
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
        'name',
        'code',
        'description',
    ];

    /**
     * Define columns and filters for datatables.net plugin.
     */
    static $datatables = [
        'columns' => [
            'name' => 'Nazwa',
            'code' => 'Kod',
            'actions' => 'Akcje',
            'id' => 'ID',
            'description' => 'Opis'
        ],
        'orderBy' => ['code', 'asc']
    ];

    /**
     * Get the users for the department.
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    /**
     * Get the user that created the department.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get unique name of the department.
     *
     * @return string
     */
    public function getExtendedNameAttribute(): string
    {
        return $this->attributes['name'];
    }

}
