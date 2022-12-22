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
        'path',
        'name',
        'code',
        'extension',
        'draft',
        'type',
    ];

    /**
     * Define columns and filters for datatables.net plugin.
     */
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

    /**
     * Get the file's clients.
     */
    public function investments()
    {
        return $this->morphedByMany('App\Models\Investment', 'fileable')->withTimestamps();
    }

    /**
     * Get all of the file's clients.
     */
    public function employees()
    {
        return $this->morphedByMany('App\Models\Employee', 'fileable')->withTimestamps();
    }

    /**
     * Get all of the file's protectives.
     */
    public function protectives()
    {
        return $this->morphedByMany('App\Models\Protective', 'fileable')->withTimestamps();
    }

    /**
     * Get all of the file's bancassurances.
     */
    public function bancassurances()
    {
        return $this->morphedByMany('App\Models\Bancassurance', 'fileable')->withTimestamps();
    }

    /**
     * Get the file category that owns the file.
     */
    public function fileCategory()
    {
        return $this->belongsTo('App\Models\FileCategory');
    }

    /**
     * Get the user that created the file.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get unique name of the model.
     *
     * @return string
     */
    public function getExtendedNameAttribute(): string
    {
        return $this->attributes['name'];
    }

    /**
     * Get file type name.
     */
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