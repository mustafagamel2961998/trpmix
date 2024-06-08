<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'=>['required','email','exists:admins,email'],
            'password'=>['required','string'],
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'يرجي ادخال البريد الالكتروني',
            'email.email'=>'عفوا صيغة البريد الالكتروني خطاء',
            'email.exists'=>'عفوا هذا البريد غير موجود',
            'password.required'=>'يرجي ادخال كلمة المرور',
            'password.string'=>'عفوا صيغة كلمة المرور خطاء',
        ];
    }
}
