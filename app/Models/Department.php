<?php

namespace App\Models;

use App\Events\DepartmentSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'description',
    ];

    protected $dispatchesEvents = [
        'updated' => DepartmentSaved::class
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
