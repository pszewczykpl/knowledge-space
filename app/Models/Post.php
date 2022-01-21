<?php

namespace App\Models;

use App\Traits\UsesCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $post_category_id
 * @property int $user_id
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $deleted_at
 */
class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
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
        'title',
        'content',
    ];

    public function postCategory()
    {
        return $this->belongsTo('App\Models\PostCategory');
    }

    /**
     * Get all of the post's events.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Get the user that created the post.
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
        return $this->attributes['title'];
    }

}
