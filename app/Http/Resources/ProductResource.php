<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code_toil' => $this->code_toil,
            'group_code' => $this->group_code,
            'group_name' => $this->group_name,
            'name' => $this->name,
            'code' => $this->code,
            'code_owu' => $this->code_owu,
            'is_subscriptions' => (int) $this->is_subscriptions,
            'subscription_code' => $this->subscription_code,
            'subscription_status' => $this->subscription_status,
            'subscription_date_from' => $this->subscription_date_from,
            'subscription_date_to' => $this->subscription_date_to,
            'kind' => $this->kind,
            'type' => $this->type,
            'partner_name' => $this->partner_name,
            'partner_code' => $this->partner_code,
            'insurer_min_age' => $this->insurer_min_age,
            'insurer_max_age' => $this->insurer_max_age,
            'insured_min_age' => $this->insured_min_age,
            'insured_max_age' => $this->insured_max_age,
            'period_of_insurance' => $this->period_of_insurance,
            'premium_type' => $this->premium_type,
            'system_status' => $this->system_status,
            'system_name' => $this->system_name,
            'published_at' => $this->published_at,
            'is_archived' => (int) $this->is_archived,
            'created_by' => new UserResource($this->user),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
