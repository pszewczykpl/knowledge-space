<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $path
 */
class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'draft',
        'type',
        'file_category_id',
        'path',
        'extension',
    ];

    public function products()
    {
        return $this->morphedByMany(Product::class, 'fileable')->withTimestamps();
    }

    public function fileCategory()
    {
        return $this->belongsTo(FileCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeNotProduct($query)
    {
        return $query->where('type', '!=', 'P');
    }
}
