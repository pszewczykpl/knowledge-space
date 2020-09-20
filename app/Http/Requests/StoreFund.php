<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFund extends FormRequest
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
            'name' => 'required|max:255',
            'code' => 'required|max:255',
            'type' => 'required|max:1',
            'currency' => 'required|max:255',
            'start_date' => 'required|date',
            'cancel_reason' => 'max:255',
            'status' => 'required|max:1',
        ];
    }
}
