<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //get admin login view 
    public function login(){
        if(Auth::guard('admin')->check()){
            return redirect()->route('index.index');
        }
        return view('Admin.Auth.login');
    }

    public function loginMethod(LoginRequest $request){

        $admin = Admin::where('email',$request->email)->first();

        if($admin->status !='active'){
            return redirect()->route('dashboard.login.view')->with('statusFailed','عفوا حسابك غير مفعل يرجي التواصل معا الادارة');
        }

        if(!Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('dashboard.login.view')->with('loginFailed','خطاء في بيانات الدخول تأكد من كملة السر');
        }
        $admin->update(['online'=>'1']);
        return redirect()->route('index.index')->with('successLoginMessage','أهلاً بك عزيز المسؤل يومك سعيد');
    }
}
