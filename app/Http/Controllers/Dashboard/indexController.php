<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexRequest;
use App\Models\Admin;
use App\Models\Singer;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::latest('id')->take(10)->get();
        $singers = Singer::with('media')->with(['admin'=>fn($q)=>$q->with('media')])->latest('id')->take(10)->get();
        $users = User::latest('id')->take(10)->get();
        return view('Admin.Dashboard.index',compact('songs','singers','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IndexRequest $request,$id)
    {
        $admin = Admin::find($id);
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $admin->clearMediaCollection('admin');
            
            $admin->addMedia($avatar)
                  ->usingName($admin->first_name . ' ' . $admin->last_name)
                  ->toMediaCollection('admin');
        }

        return redirect()->route('index.index')->with('success','تم تعديل الصورة الشخصية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('dashboard.login.view')->with('success','تم تسجيل الخروج بنجاح');
    }
}
