<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code_toil' => 'required|string|max:255',
            'group_code' => 'required|string|max:255',
            'group_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'code_owu' => 'required|string|max:255',
            'is_subscriptions' => 'required|boolean',
            'subscription_code' => 'string|max:255',
            'subscription_status' => 'string|max:255',
            'subscription_date_from' => 'date|max:255',
            'subscription_date_to' => 'date|max:255',
            'kind' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'partner_name' => 'required|string|max:255',
            'partner_code' => 'required|string|max:255',
            'insurer_min_age' => 'numeric',
            'insurer_max_age' => 'numeric',
            'insured_min_age' => 'required|numeric',
            'insured_max_age' => 'required|numeric',
            'period_of_insurance' => 'numeric',
            'premium_type' => 'required|string|max:255',
            'system_status' => 'required|string|max:255',
            'system_name' => 'required|string|max:255',
            'published_at' => 'required|date',
            'is_archived' => 'required|boolean',
        ];
    }
}
