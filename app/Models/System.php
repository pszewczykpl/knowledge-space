<?php

namespace App\Models;

use App\Events\SystemSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class System extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'url',
        'description',
    ];

    protected $dispatchesEvents = [
        'saved' => SystemSaved::class
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
