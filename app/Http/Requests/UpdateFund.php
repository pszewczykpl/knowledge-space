<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFund extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'status' => 'required|max:1',
            'type' => 'required|max:1',
            'currency' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'cancel_date' => 'nullable|date',
            'cancel_reason' => 'nullable|string|max:255',
        ];
    }
}
