<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSenderRequest extends FormRequest
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
            'name' => '',
            'family' => '',
            'phone' => 'numeric',
            'postalCode' => 'numeric',
            'address' => '',
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
        // 'name.required' => 'نام الزامی است',
        // 'family.required' => 'نام خانوادگی الزامی است',
        'phone.numeric' => 'شماره تماس را عددی وارد کنید',
        'postalCode.numeric' => 'کد پستی را عددی وارد کنید',
        // 'address.required' => 'آدرس الزامی است',
        ];
}
}
