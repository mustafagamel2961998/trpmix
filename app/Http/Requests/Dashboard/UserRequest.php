<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $id = request()->route('user');
        return [
            'name'=>['required','string','max:255'],
            'email'=>['required','email',Rule::unique('users','email')->ignore($id)],
            'password'=>['required','min:8'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'حقل الاسم مطلوب',
            'name.string'=>'حقل الاسم يجب أن يكون نصي',
            'name.max'=>'يجب أن يكون حقل الاسم من 1 الي 255 حرف فقط',
            'email.required'=>'حقل البريد الالكتروني مطلوب',
            'email.email'=>'خطاء في صيغة البريد الالكتروني',
            'email.unique'=>'عفوا هذا البريد الالكتروني موجود سابقا',
            'password.required'=>'حقل كلمة المرور مطلوب',
            'password.min'=>'يجب أن يكون حقل كلمة المرو علي الاقل 8 أحرف',
        ];
    }
}
