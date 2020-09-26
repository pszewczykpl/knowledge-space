<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartner extends FormRequest
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
            'number_rau' => 'nullable|string|max:255',
            'code' => 'required|string|max:255',
            'nip' => 'nullable|numeric',
            'regon' => 'nullable|numeric',
            'type' => 'required|string|max:255',
        ];
    }
}
