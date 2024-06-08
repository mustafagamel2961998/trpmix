<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'avatar'=>['required','image','mimes:jpeg,png,jpg','max:5120']
        ];
    }
    public function messages()
    {
        return[
            'avatar.required'=>'حقل الصوره مطلوب',
            'avatar.image'=>'خطاء في الملف يجب ان يكون صورة',
            'avatar.mimes'=>'صيغة الصوره يجب ان تكون jpg / png / jpeg ',
            'avatar.max'=>'يجب ان يكون حجم الصوره اقل من 5 ميجا بايت',
        ];
    }
}
