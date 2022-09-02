<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCargoRequest extends FormRequest
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
            'name' => 'required',
            'origin' => 'required',
            'destination' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام الزامی است.',
            'origin.required' => 'مبدا الزامی است.',
            'destination.required' => 'مقصد الزامی است.',
        ];
    }
}
