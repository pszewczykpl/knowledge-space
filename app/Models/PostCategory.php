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
 * @property string $description
 * @property int $user_id
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $deleted_at
 */
class PostCategory extends Model
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
        'description',
    ];

    /**
     * Define columns and filters for datatables.net plugin.
     */
    static $datatables = [
        'columns' => [
            'name' => 'Nazwa',
            'actions' => 'Akcje',
            'id' => 'ID',
        ],
        'orderBy' => ['name', 'asc']
    ];

    /**
     * Get the posts for the post category.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * Get the user that created the post category.
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

}
