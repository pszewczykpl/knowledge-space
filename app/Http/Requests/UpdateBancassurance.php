<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBancassurance extends FormRequest
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
            'name' => 'required|string|max:255',
            'code' => 'required|numeric',
            'dist_short' => 'required|string|max:255',
            'dist' => 'required|string|max:255',
            'code_owu' => 'required|string|max:255',
            'subscription' => 'required|numeric',
            'edit_date' => 'required|date',
            'status' => 'required|max:1',
        ];
    }
}
