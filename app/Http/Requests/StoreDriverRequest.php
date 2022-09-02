<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverRequest extends FormRequest
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
            'family' => 'required',
            'phone' => 'required|numeric',
            'age' => 'required|numeric',
            'license' => 'required|numeric|min:0|max:3',
            'license_number' => 'required|numeric',
        ];
    }

    // public function attributes()
    // {
    //     return [
    //         // 'name' => 'نام الزامی است.'
    //     ];
    // }

    public function messages()
{
    return [
        'name.required' => 'نام الزامی است',
        'family.required' => 'نام خانوادگی الزامی است',
        'phone.required' => 'شماره تماس الزامی است',
        'age.required' => 'سن الزامی است',
        'license.required' => 'گواهینامه الزامی است',
        'license_number.required' => 'شماره گواهینامه الزامی است',
        ];
}
}
