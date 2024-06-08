<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::latest('id')->with('media')->paginate(10);
        return view('Admin.Dashboard.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = new Admin();
        $permissions = Permission::with('roles')->get();
        $roles = Role::all();
        return view('Admin.Dashboard.admin.create',compact('admin','permissions','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        
        $request->merge([
            'password'=>Hash::make($request->password),
        ]);
        $admin = Admin::create($request->all());
        $admin->syncRoles($request->roles);

        
        if($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $admin->addMedia($image)
                    ->usingName($admin->first_name .' ' . $admin->last_name)
                    ->toMediaCollection('admin');
        }
        return redirect()->route('admin.index')->with('success','تم إنشاء المسؤل بنجاح');
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
    public function edit(Admin $admin)
    {
      
        $roles = Role::all();
        return view('Admin.Dashboard.admin.edit',compact('admin','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {


        $admin = Admin::find($id);
        
        if(!Hash::check($request->password,$admin->password)){
            return redirect()->back()->with('errorPassword','عفوا كلمة السر خطاء');
        }
        $request->merge([
            'password'=>Hash::make($request->password),
        ]);
         
        $admin->update($request->all());
        $admin->syncRoles($request->roles);
   

        if($request->hasFile('avatar')){
            $admin->clearMediaCollection('admin');
            $image = $request->file('avatar');
            $admin->addMedia($image)
                    ->usingName($admin->first_name .' ' . $admin->last_name)
                    ->toMediaCollection('admin');
        }
        return redirect()->route('admin.index')->with('success','تم تعديل بيانات المسؤل بنجاح');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
