<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'type',
        'currency',
        'status',
        'start_date',
        'cancel_date',
        'cancel_reason',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
