<?php

namespace App\Models;

use App\Traits\HasDatatables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $path
 * @property string $name
 * @property string $extension
 * @property string|null $code
 * @property bool $draft
 * @property string $type
 * @property int $file_category_id
 * @property int $user_id
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $deleted_at
 */
class File extends Model
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
        'path',
        'name',
        'code',
        'extension',
        'draft',
        'type',
    ];

    static $datatables = [
        'columns' => [
            'name' => 'Nazwa',
            'file_category_name' => 'Kategoria',
            'path' => 'Ścieżka',
            'actions' => 'Akcje',
            'id' => 'ID',
            'extension' => 'Rozszerzenie pliku',
            'file_category_id' => 'ID Kategorii',
            'draft' => 'Dokument roboczy',
            'type' => 'Typ dokumentu',
        ],
        'where' => [['draft', '=', 0], ['type', '=', 'I']],
        'orderBy' => ['name', 'asc']
    ];

    public function investments()
    {
        return $this->morphedByMany('App\Models\Investment', 'fileable')->withTimestamps();
    }

    public function employees()
    {
        return $this->morphedByMany('App\Models\Employee', 'fileable')->withTimestamps();
    }

    public function protectives()
    {
        return $this->morphedByMany('App\Models\Protective', 'fileable')->withTimestamps();
    }

    public function bancassurances()
    {
        return $this->morphedByMany('App\Models\Bancassurance', 'fileable')->withTimestamps();
    }

    public function fileCategory()
    {
        return $this->belongsTo('App\Models\FileCategory');
    }

    /**
     * Get all of the file's events.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Get the user that created the file.
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
        return $this->attributes['name'];
    }

    public function getTypeAttribute()
    {
        return match ($this->attributes['type']) {
            'P' => 'Produktowy',
            'I' => 'Pozostały',
            default => $this->attributes['type'],
        };
    }

    /**
     * Get fileCategory name from cached relation.
     *
     * @return string
     */
    public function getFileCategoryNameAttribute(): string
    {
        return $this->fileCategory->name;
    }

}