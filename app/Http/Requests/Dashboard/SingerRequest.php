<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SingerRequest extends FormRequest
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
        $id = request()->route('singer');
        if($id){
            return [
                'image'=>['image','mimes:png,jpg'],
                'name'=>['required','string','max:255',Rule::unique('singers','name')->ignore($id)],
                'bio'=>['required','string','max:255'],
                'country_code'=>['required','max:3','string'],
                'status'=>['required','in:active,archived'],
                'single_status'=>['required','in:single,with_singer'],
            ];
        } else{
            return [
                'image'=>['required','image','mimes:png,jpg'],
                'name'=>['required','string','max:255',Rule::unique('singers','name')],
                'bio'=>['required','string','max:255'],
                'country_code'=>['required','max:3','string'],
                'status'=>['required','in:active,archived'],
                'single_status'=>['required','in:single,with_singer'],
            ];
        }

    }
    public function messages()
    {
        return [
            'image.required'=>'يجب عليك تحديد صورة للمطرب',
            'image.image'=>'خطاء في صيغة الصورة',
            'image.mimes'=>'يجب أن تكون صيغة الصورة png أو jpg',
            'name.required'=>'حقل الاسم مطلوب',
            'name.string'=>'يجب أن يكون حقل الاسم نصي',
            'name.unique'=>'عفوا أسم المطرب  موجود سابقا',
            'name.max'=>'الحد الاقصي لحقل الاسم 255 حرف فقط',
            'bio.required'=>'حقل السيرة الذاتية مطلوب',
            'bio.string'=>'يجب أن يكون حقل السيرة الذاتية نصي',
            'bio.max'=>'الحد الاقصي لحقل السيرة الذاتية 255 حرف فقط',
            'country_code.required'=>'حقل الدولة مطلوب',
            'country_code.string'=>'يجب أن يكون حقل الدولة نصي',
            'country_code.max'=>'الحد الاقصي لحقل الدولة هوه 3 أحرف فقط',
            'status.required'=>'يرجي تحديد حالة المطرب',
            'status.in'=>'يجب تحديد حالة المطرب مفعل أو غير مفعل',
            'single_status.required'=>'يرجي تحديد حالة المطرب اذا كان فردي ام لا',
            'single_status.in'=>'يجب تحديد حالة المطرب فردي أو  معا مطرب أخر',
        ];
    }
}
