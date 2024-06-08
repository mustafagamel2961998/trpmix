<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\Dashboard\SettingRule;
use Illuminate\Foundation\Http\FormRequest;

class SettingReauest extends FormRequest
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
            'logo'=>['nullable','image','mimes:png,jpg'],
            'website_name'=>['required','string'],
            'website_descritpion'=>['required','string'],
            'website_keywords'=>['required','array'],
            'website_copy_right'=>['required','string'],
            'covers'=>['in:nullable,1'],
            'website_ads'=>['in:nullable,1'],
            'google_ads'=>['in:nullable,1'],
            'facebook'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
            'youtube'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
            'twitter'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
        ];
    }
    public function messages()
    {
        return [
            'logo.image'=>'خطاء في الصورة',
            'logo.mimes'=>'عفوا صيغة الصور يجب أن تكون png أو jpg',
            'website_name.required'=>'حقل أسم الموقع مطلوب',
            'website_name.string'=>'يجب أن يكون حقل أسم الموقع نصي',
            'website_descritpion.required'=>'حقل وصف الموقع مطلوب',
            'website_descritpion.string'=>'يجب ان يكون حقل وصف الموقع نصي',
            'website_keywords.required'=>'حقل الكلمات المفتاحية مطلوب',
            'website_descritpion.array'=>'يجب أن يكون حقل الكلمات المفتاحية مكون من اكثر من كلمة مفتاحية',
            'website_copy_right.required'=>'حقل حقوق الملكية مطلوب',
            'website_copy_right.string'=>'يجب ان يكون حقل حقوق الملكية نصي',
            'covers.in'=>'يحب أن يكون حقل حالة الغلاف (محدد) أو (غير محدد) فقط',
            'website_ads.in'=>'يحب أن يكون حقل حالة اعلانات الموقع (محدد) أو (غير محدد) فقط',
            'google_ads.in'=>'يحب أن يكون حقل حالة اعلانات جوجال ادسنس (محدد) أو (غير محدد) فقط',
            'facebook.regex'=>'حقل رابط الفيس بوك يجب ان يكون رابط حقيقي',
            'youtube.regex'=>'حقل رابط اليوتيوب يجب ان يكون رابط حقيقي',
            'twitter.regex'=>'حقل رابط تويتر يجب ان يكون رابط حقيقي',
        ];
    }
}
