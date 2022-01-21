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
 * @property int $news_id
 * @property int $user_id
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $deleted_at
 */
class Reply extends Model
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

    public function news()
    {
        return $this->belongsTo('App\Models\News');
    }

    /**
     * Get all of the reply's events.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }
    
    /**
     * Get the user that created the reply.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
