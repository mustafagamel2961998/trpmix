<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AdwebsiteRequest extends FormRequest
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
        $id = request()->route('website');
        if($id){
            return [
                'logo_image'=>['image','mimes:png,jpg'],
                'computer_image'=>['image','mimes:png,jpg'],
                'mobile_image'=>['image','mimes:png,jpg'],
                'song_id'=>['required','exists:songs,id'],
                'pin'=>['in:0,1']
            ];
        }else{
            return [
                'logo_image'=>['required','image','mimes:png,jpg'],
                'computer_image'=>['required','image','mimes:png,jpg'],
                'mobile_image'=>['required','image','mimes:png,jpg'],
                'song_id'=>['required','exists:songs,id'],
                'pin'=>['required','in:0,1']
            ];
        }
        
    }
    public function messages()
    {
        return [
            'logo_image.required'=>'حقل شعار الاعلان مطلوب',
            'logo_image.image'=>'حقل شعار الاعلان يجب أن يكون صوره حقيقية',
            'logo_image.mimes'=>'حقل شعار الاعلان يجب أن تكون صيغة الصورة png أو jpg',

            'computer_image.required'=>'حقل صورة الاعلان علي الكمبيوتر مطلوب',
            'computer_image.image'=>'حقل صورة الاعلان علي الكمبيوتر يجب أن يكون صوره حقيقية',
            'computer_image.mimes'=>'حقل  صورة الاعلان علي الكمبيوتر يجب أن تكون صيغة الصورة png أو jpg',

            'mobile_image.required'=>'حقل صورة الاعلان علي الموبيل مطلوب',
            'mobile_image.image'=>'حقل صورة الاعلان علي الموبيل يجب أن يكون صوره حقيقية',
            'mobile_image.mimes'=>'حقل  صورة الاعلان علي الموبيل يجب أن تكون صيغة الصورة png أو jpg',

            'song_id.required'=>'حقل إغنية الاعلان مطلوب',
            'song_id.exists'=>'عفوا الاغنية المختاره غير موجوده',

            'pin.required'=>'حقل حالة الاعلان مطلوب',
            'pin.in'=>'يجب تحديد حقل حالة الاعلان مثبت أو غير مثبت',


        ];
    }
}
