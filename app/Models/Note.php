<?php

namespace App\Models;

use App\Traits\HasDatatables;
use App\Traits\UsesCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $content
 * @property int $user_id
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $deleted_at
 */
class Note extends Model
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
        'content',
    ];

    static $datatables = [
        'columns' => [
            'content' => 'Treść',
            'actions' => 'Akcje',
            'id' => 'ID',
        ],
        'orderBy' => ['content', 'asc']
    ];

    public function investments()
    {
        return $this->morphedByMany('App\Models\Investment', 'noteable')->withTimestamps();
    }

    public function protectives()
    {
        return $this->morphedByMany('App\Models\Protective', 'noteable')->withTimestamps();
    }

    public function bancassurances()
    {
        return $this->morphedByMany('App\Models\Bancassurance', 'noteable')->withTimestamps();
    }

    public function employees()
    {
        return $this->morphedByMany('App\Models\Employee', 'noteable')->withTimestamps();
    }

    public function funds()
    {
        return $this->morphedByMany('App\Models\Fund', 'noteable')->withTimestamps();
    }

    public function partners()
    {
        return $this->morphedByMany('App\Models\Partner', 'noteable')->withTimestamps();
    }

    public function risks()
    {
        return $this->morphedByMany('App\Models\Risk', 'noteable')->withTimestamps();
    }

    /**
     * Get the user that created the note.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
