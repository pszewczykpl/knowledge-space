<?php

namespace App\Models;

use App\Traits\CacheModels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class File extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CacheModels;

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
    ];

    public function investments()
    {
        return $this->morphedByMany('App\Models\Investment', 'fileable')->withTimestamps();
    }

    /**
     * Get investments attribute value from cached data.
     *
     * @return mixed
     */
    public function getInvestmentsAttribute()
    {
        return $this->getCachedRelation('investments');
    }

    public function employees()
    {
        return $this->morphedByMany('App\Models\Employee', 'fileable')->withTimestamps();
    }

    /**
     * Get employees attribute value from cached data.
     *
     * @return mixed
     */
    public function getEmployeesAttribute()
    {
        return $this->getCachedRelation('employees');
    }

    public function protectives()
    {
        return $this->morphedByMany('App\Models\Protective', 'fileable')->withTimestamps();
    }

    /**
     * Get protectives attribute value from cached data.
     *
     * @return mixed
     */
    public function getProtectivesAttribute()
    {
        return $this->getCachedRelation('protectives');
    }

    public function bancassurances()
    {
        return $this->morphedByMany('App\Models\Bancassurance', 'fileable')->withTimestamps();
    }

    /**
     * Get bancassurances attribute value from cached data.
     *
     * @return mixed
     */
    public function getBancassurancesAttribute()
    {
        return $this->getCachedRelation('bancassurances');
    }

    public function fileCategory()
    {
        return $this->belongsTo('App\Models\FileCategory');
    }

    /**
     * Get fileCategory attribute value from cached data.
     *
     * @return mixed
     */
    public function getFileCategoryAttribute()
    {
        return $this->getCachedRelation('fileCategory');
    }

    /**
     * Get all of the file's events.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Get events attribute value from cached data.
     *
     * @return mixed
     */
    public function getEventsAttribute()
    {
        return $this->getCachedRelation('events');
    }

    /**
     * Get the user that created the file.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get user attribute value from cached data.
     *
     * @return mixed
     */
    public function getUserAttribute()
    {
        return $this->getCachedRelation('user');
    }

}