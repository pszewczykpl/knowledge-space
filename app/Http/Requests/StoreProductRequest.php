<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'code_toil' => 'nullable|string|max:255',
            'group_code' => 'nullable|string|max:255',
            'group_name' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:255',
            'code_owu' => 'required|string|max:255',
            'is_subscriptions' => 'required|boolean',
            'subscription_code' => 'nullable|string|max:255',
            'subscription_status' => 'nullable|string|max:255',
            'subscription_date_from' => 'nullable|date|max:255',
            'subscription_date_to' => 'nullable|date|max:255',
            'kind' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'partner_name' => 'nullable|string|max:255',
            'partner_code' => 'nullable|string|max:255',
            'insurer_min_age' => 'nullable|numeric',
            'insurer_max_age' => 'nullable|numeric',
            'insured_min_age' => 'nullable|numeric',
            'insured_max_age' => 'nullable|numeric',
            'period_of_insurance' => 'nullable|numeric',
            'premium_type' => 'nullable|string|max:255',
            'system_status' => 'nullable|string|max:255',
            'system_name' => 'required|string|max:255',
            'published_at' => 'required|date',
            'is_archived' => 'required|boolean',
        ];
    }
}
