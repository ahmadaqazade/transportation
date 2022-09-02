<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSenderRequest extends FormRequest
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
            'postalCode' => 'required|numeric',
            'address' => 'required',
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
        'postalCode.required' => 'کد پستی الزامی است',
        'address.required' => 'آدرس الزامی است',
        ];
}
}
