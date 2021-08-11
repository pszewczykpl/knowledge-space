<?php

namespace App\Models;

use App\Traits\CacheModels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemProperty extends Model
{
    use HasFactory;
    use CacheModels;

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

    public static function getValue(string $key)
    {
        return self::where('key', '=', $key)->firstOrFail()->value;
    }
}
