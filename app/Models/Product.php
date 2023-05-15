<?php

namespace App\Models;

use App\Enums\ProductPremiumType;
use App\Enums\ProductKind;
use App\Enums\ProductType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code_toil',
        'group_code',
        'group_name',
        'name',
        'code',
        'code_owu',
        'is_subscriptions',
        'subscription_code',
        'subscription_status',
        'subscription_date_from',
        'subscription_date_to',
        'kind',
        'type',
        'partner_name',
        'partner_code',
        'insurer_min_age',
        'insurer_max_age',
        'insured_min_age',
        'insured_max_age',
        'period_of_insurance',
        'premium_type',
        'system_status',
        'system_name',
        'published_at',
        'is_archived',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'kind' => ProductKind::class,
        'type' => ProductType::class,
        'premium_type' => ProductPremiumType::class,
//        'published_at' => 'date:Y-m-d',
    ];

    /**
     * Get the files for the Product.
     *
     * @return MorphToMany
     */
    public function files(): MorphToMany
    {
        return $this->morphToMany(File::class, 'fileable')->withTimestamps();
    }

    /**
     * Get all the Product's comments.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get the user that created the Product.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
