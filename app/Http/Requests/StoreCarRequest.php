<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'year' => 'required|numeric',
            'brand' => 'required',
            'capacity' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام الزامی است',
            'year.required' => ' سال ساخت الزامی است',
            'brand.required' => 'برند الزامی است',
            'capacity.required' => ' ظرفیت الزامی است',
        ];
    }
}
