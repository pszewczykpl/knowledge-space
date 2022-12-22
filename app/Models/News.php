<?php

namespace App\Models;

use App\Traits\UsesCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $content
 * @property int $user_id
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $deleted_at
 */
class News extends Model
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
        'content',
    ];

    /**
     * Get the replies for the news.
     */
    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }

    /**
     * Get the user that created the news.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
