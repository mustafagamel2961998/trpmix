<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
        $id = request()->route('admin');
        if($id){
            return [
                'avatar'=>['image','mimes:png,jpg','max:10240'],
                'first_name'=>['required','string','max:255'],
                'last_name'=>['string','max:255'],
                'email'=>['required','email',Rule::unique('admins','email')->ignore($id)],
                'password'=>['required','min:8'],
                'phone'=>['required','numeric',Rule::unique('admins','phone')->ignore($id)],
            ];
        }else {
            return [
                'avatar'=>['required','image','mimes:png,jpg','max:10240'],
                'first_name'=>['required','string','max:255'],
                'last_name'=>['string','max:255'],
                'email'=>['required','email',Rule::unique('admins','email')],
                'password'=>['required','min:8'],
                'phone'=>['required','numeric',Rule::unique('admins','phone')],
            ]; 
        }
       
    }
    public function messages()
    {
        return [
            'avatar.required'=>'حقل الصورة مطلوب',
            'avatar.image'=>'عفوا خطاء في الصورة',
            'avatar.mimes'=>'يجب أن تكون  صيغة الصورة png أو jpg',
            'avatar.max'=>'عفوا الحد الاقصي لحجم الملف هوه 10 ميجا فقط',
            'first_name.required'=>'حقل الاسم الاول مطلوب',
            'first_name.string'=>'حقل الاسم الاول يجب أن يكون نصي',
            'first_name.max'=>'حقل الاسم الاول يجب أن يكون من 1 الي 255 حرف كحد أقصي',
            'last.string'=>'حقل الاسم الاخير يجب أن يكون نصي',
            'last.max'=>'حقل الاسم الاخير يجب أن يكون من 1 الي 255 حرف كحد أقصي',
            'email.required'=>'حقل البريد الالكتروني مطلوب',
            'email.email'=>'عفوا صيغة البريد  الالكتروني خطاء',
            'email.unique'=>'هذا البريد موجود سابقا',
            'password.required'=>'حقل كلمة المرور مطلوب',
            'password.min'=>'يجب أن يكون حقل كلمة المرو علي الاقل 8 أحرف',
            'phone.required'=>'حقل الموبيل مطلوب',
            'phone.numeric'=>'يجب أن يكون حقل الموبيل صحيح',
            'phone.unique'=>'عفوا رقم الموبيل موجود سابقا',
        ];
    }
}
