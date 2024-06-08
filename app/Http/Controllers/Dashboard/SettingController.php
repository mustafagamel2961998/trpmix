<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingReauest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $setting = Setting::query()->first();
        return view('Admin.Dashboard.setting.index',compact('setting'));
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
    public function update(SettingReauest $request, string $id)
    {   
        // if(!$request->covers){
        //     $request->merge([
        //         'covers'=>'0'
        //     ]);
        // }
        if(!$request->website_ads){
            $request->merge([
                'website_ads'=>'0'
            ]);
        }
        if(!$request->google_ads){
            $request->merge([
                'google_ads'=>'0'
            ]);
        }
      
        $update = Setting::find($id);
        $update->update($request->all());
        if($request->hasFile('logo')){
            if($update->getMedia('setting')){
                $update->clearMediaCollection('setting');
            }
            $logo = $request->file('logo');
            $update->addMedia($logo)
                    ->usingName('logo')
                    ->toMediaCollection('setting');
                    
        }
        return redirect()->route('setting.index')->with('success','تم تعديل إعدادات الموقع بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
