<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
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
        $id = request()->route('song');
        if($id){
            return [
                'image'=>['image','mimes:png,jpg'],
                'title'=>['required','string','max:255'],
                
                'words'=>['nullable','string'],
                'listen_link'=>['required','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'download_link'=>['required','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'album_id'=>['nullable','exists:albums,id'],
                // 'singer_id'=>['required','exists:singers,id'],
                'singer_name'=>['required','exists:singers,name'],
                // 'singer_duet_id'=>['nullable','exists:singers,id'],
                'singer_duet_name'=>['nullable','exists:singers,name'],

                
                'category_id'=>['required','exists:categories,id'],
                'year'=>['required','string'],
                'time'=>['required','string','max:255'],
                'kind'=>['required','string'],
                'status'=>['required','in:pin,active,archived'],
            ];
        }else{
            return [
                'image'=>['required','image','mimes:png,jpg'],
                'title'=>['required','string','max:255'],
                'slug'=>['exists:songs,slug'],
                'words'=>['nullable','string'],
                'listen_link'=>['required','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'download_link'=>['required','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'album_id'=>['nullable','exists:albums,id'],
                // 'singer_id'=>['required','exists:singers,id'],
                'singer_name'=>['required','exists:singers,name'],
                // 'singer_duet_id'=>['nullable','exists:singers,id'],
                'singer_duet_name'=>['nullable','exists:singers,name'],
                'category_id'=>['required','exists:categories,id'],
                'year'=>['required','string'],
                'time'=>['required','string','max:255'],
                'kind'=>['required','string'],
                'status'=>['required','in:pin,active,archived'],
            ];
        }
        
    }
    public function messages()
    {
        return [
            'image.required'=>'حقل صورة الاغنية مطلوب',
            'image.image'=>'خطاء في صيغة الصورة',
            'slug.exists'=>'أسم الاغنية موجود سابقا',
            'image.mimes'=>'يجب أن تكون صيغة الصورة png أو jpg',
            'title.required'=>'حقل عنوان الاغنية مطلوب',
            'title.string'=>'يجب أن يكون حقل عنوان الاغنية نصي',
            'title.max'=>'يجب أن يكون حقل عنوان الاغنية من 1 الي 255 حرف',
            'words.string'=>'يجب أن يكون حقل كلمات الاغنية نصي',
            'listen_link.required'=>'حقل رابط الاستماع للاغنية مطلوب',
            'listen_link.regex'=>'حقل رابط الاستماع للاغنية غير صحيح',
            'download_link.required'=>'حقل رابط تحميل الاغنية مطلوب',
            'download_link.regex'=>'حقل رابط تحميل الاغنية غير صحيح',
            'album_id.exists'=>'عفوا الالبوم الذي تم تحديدو غير موجود',
            'singer_id.exists'=>'عفوا المطرب الذي تم تحديدو غير موجود',
            'singer_duet_id.exists'=>'عفوا المطرب الذي تم تحديدو غير موجود',
            'category_id.required'=>'حقل اختيار قسم الاغنية مطلوب',
            'category_id.exists'=>'عفوا القسم الذي تم تحديدو غير موجود',
            'year.required'=>'حقل سنة الاغنية مطلوب',
            'year.date'=>'عفوا صيغة حقل سنة الاغنيه غير صحيح يجب أن يكون تاريخ صحيح',
            'time.required'=>'حقل وقت الاغنية مطلوب',
            'time.string'=>'عفوا صيغة حقل وقت الاغنية غير صحيح',
            'time.max'=>'يجب أن يكون حقل وقت الاغنية من 1 الي 255 حرف',
            'kind.required'=>'حقل نوع الاغنية مطلوب',
            'kind.string'=>'يجب أن يكون حقل نوع الاغنية نصي',
            'status.required'=>'حقل حالة الاغنية مطلوب',
            'status.in'=>'يجب عليك اختيار حالة الاغنية (مثبة أو مفعله أو غير مفعلة)',
        ];
    }
}
