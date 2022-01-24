<?php

namespace App\Models;

use App\Traits\UsesCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $key
 * @property string $value
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 */
class SystemProperty extends Model
{
    use HasFactory;
    use UsesCache;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'value',
    ];

    public static $properties = [
        'default_edit_date'
    ];

    public static function find(string $key)
    {
        return self::where('key', '=', $key)->firstOrFail();
    }
}
