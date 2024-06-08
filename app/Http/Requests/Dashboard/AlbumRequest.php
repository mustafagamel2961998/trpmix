<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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
        $id = request()->route('album');
        if($id){
            return [
                'singer_id'=>['required','exists:singers,id'],
                'image'=>['image','mimes:png,jpg'],
                'name'=>['required','string','max:255'],
                'album_download_link'=>['required','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'status'=>['required','in:active,archived'],
            ];
        } else{
            return [
                'singer_id'=>['required','exists:singers,id'],
                'image'=>['required','image','mimes:png,jpg'],
                'name'=>['required','string','max:255'],
                'album_download_link'=>['required','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'status'=>['required','in:active,archived'],
            ];
        }
    }
    public function messages()
    {
        return [
            'singer_id.required'=>'يجب عليك تحديد المطرب',
            'singer_id.exists'=>'المطرب المحدد غير موجود',
            'image.required'=>'حقل صورة الالبوم مطلوبة',
            'image.image'=>'خطاء في الصورة',
            'image.mimes'=>'عفوا صيغة الصور يجب أن تكون png أو jpg',
            'name.required'=>'حقل الاسم مطلوب',
            'name.string'=>'حقل الاسم يجب أن يكون نصي',
            'name.max'=>'حقل الاسم يجب أن يكون من 1 الي 255 حرف فقط',
            'album_download_link.required'=>'حقل رابط تحميل الالبوم مطلوب',
            'album_download_link.regex'=>'يجب أن يكون حقل رابط تحميل الالبوم رابط صحيح',
            'status.required'=>'حقل حالة الالبوم مطلوب',
            'status.in'=>'يجب عليك تحديد حالة الالبوم مفعل أو غير مفعل',
        ];
    }
}
