<?php

namespace App\Models;

use App\Traits\HasDatatables;
use App\Traits\UsesCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 */
class Permission extends Model
{
    use HasFactory;
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
        'description', 
    ];

    /**
     * Define columns and filters for datatables.net plugin.
     */
    static $datatables = [
        'columns' => [
            'name' => 'Nazwa',
            'code' => 'Kod',
            'description' => 'Opis',
            'id' => 'ID',
        ],
        'orderBy' => ['code', 'asc']
    ];

    /**
     * Get the users for the permission.
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_permission')->withTimestamps();
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
