<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $id = request()->route('category');
        return [
            'name'=>['required','string',Rule::unique('categories','name')->ignore($id)],
            'description'=>['required','string'],
            'status'=>['required','in:active,archived'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'حقل أسم القسم مطلوب',
            'name.string'=>'يجب أن يكون حقل الاسم نصي',
            'name.unique'=>'حقل الاسم موجود سابقا',
            'description.required'=>'حقل وصف القسم مطلوب',
            'description.string'=>'حقل وصف القسم يجب أن يكون نصي',
            'status.required'=>'يرجي تحديد حالة القسم',
            'status.in'=>'يرجي تحديد حالة القسم مفعل أو غير مفعل',
        ];
    }
}
