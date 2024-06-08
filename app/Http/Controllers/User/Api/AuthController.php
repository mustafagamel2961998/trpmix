<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function loginMethod(Request $request)
    {
        $request->validate([
            'email'=>['required','email','exists:users,email'],
            'password'=>['required'],
        ],[
            'email.required'=>'حقل البريد الالكتروني مطلوب',
            'email.email'=>'صيغة البريد الالكتروني غير صحيحه',
            'email.exists'=>' البريد الالكتروني غير موجود',
            'password.required'=>'حقل كلمة مطلوب',
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $token = $request->user()->createToken('auth-token')->plainTextToken;
            return response()->json(['token' => $token,'message'=>'تم تسجيل الدخول بنجاح'], 200);
        }
    }

    // register method
    public function registerMethod(Request $request){
        $request->validate([
            'name'=>['required','string','min:3','max:255'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','confirmed','min:6'],
        ],[
            'name.required'=>'حقل الاسم مطلوب',
            'name.string'=>'صيغة حقل الاسم غير صحيحه',
            'name.max'=>'يجب أن يكون حقل الاسم بين3 الي 255 حرف فقط',
            'name.min'=>'يجب أن يكون حقل الاسم بين3 الي 255 حرف فقط',
            'email.required'=>'حقل البريد الالكتروني مطلوب',
            'email.email'=>'صيغة البريد الالكتروني غير صحيحه',
            'email.unique'=>' البريد الالكتروني موجود سابقا',
            'password.required'=>'حقل كلمة مطلوب',
            'password.min'=>'يجب أن يكون كلمة السر علي الاقل 6 أحرف',
            'password.confirmed'=>'كلمة السر غير متطابقه',
        ]);

        $user = User::create($request->all());
        if($user){
            $token = $user->createToken('auth-token')->plainTextToken;
            return response()->json(['token' => $token,'message'=>'تم تسجيل حسابك بنجاح'], 200);
        }
    }
}
