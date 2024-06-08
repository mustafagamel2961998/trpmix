<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdwebsiteRequest;
use App\Models\Adwebsite;
use App\Models\Song;
use Illuminate\Http\Request;

class AdvertisementWebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adwebsites = Adwebsite::with('media')->latest()->paginate(10);

        return view('Admin.Dashboard.advertisement.website.index',compact('adwebsites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $adwebsite = new Adwebsite();
        $songs = Song::where('status','active')->get();
        return view('Admin.Dashboard.advertisement.website.create',compact('adwebsite','songs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdwebsiteRequest $request)
    {
     
        $create = Adwebsite::create($request->all());
        if($request->hasFile('logo_image')){
            // if($create->getMedia('adwebsite_logo')){
            //     $create->clearMediaCollection('adwebsite_logo');
            // }
            $logo_image = $request->file('logo_image');
            $create->addMedia($logo_image)
                    ->usingName('Ad Website logo')
                    ->toMediaCollection('adwebsite_logo');
                    
        }

        if($request->hasFile('computer_image')){
            // if($create->getMedia('adwebsite_logo')){
            //     $create->clearMediaCollection('adwebsite_logo');
            // }
            $computer_image = $request->file('computer_image');
            $create->addMedia($computer_image)
                    ->usingName('Ad Website Computer')
                    ->toMediaCollection('adwebsite_computer');
                    
        }

        if($request->hasFile('mobile_image')){
            // if($create->getMedia('adwebsite_logo')){
            //     $create->clearMediaCollection('adwebsite_logo');
            // }
            $computer_image = $request->file('mobile_image');
            $create->addMedia($computer_image)
                    ->usingName('Ad Website Mobile')
                    ->toMediaCollection('adwebsite_mobile');
                    
        }

        return redirect()->route('website.index')->with('success','تم إضافة الاعلان للموقع بنجاح');
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
        $adwebsite = Adwebsite::where('id',$id)->with('media')->first();
        $songs = Song::where('status','active')->get();
        return view('Admin.Dashboard.advertisement.website.edit',compact('adwebsite','songs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdwebsiteRequest $request, string $id)
    {
        // $checkIfPinExistOrNo = Adwebsite::where('pin','1')->count();
        // if($checkIfPinExistOrNo = 1 && $request->pin ==='1'){
        //     return redirect()->route('website.index')->with('failed','يجب عليك ازالة الاعلان الثابت الاخر اولا');
        // }
        $update = Adwebsite::find($id);
        
        $update->update($request->all());
        
        if($request->hasFile('logo_image')){
            if($update->getMedia('adwebsite_logo')){
                $update->clearMediaCollection('adwebsite_logo');
            }
            $logo_image = $request->file('logo_image');
            $update->addMedia($logo_image)
                    ->usingName('Ad Website logo')
                    ->toMediaCollection('adwebsite_logo');
                    
        }

        if($request->hasFile('computer_image')){
            if($update->getMedia('adwebsite_computer')){
                $update->clearMediaCollection('adwebsite_computer');
            }
            $computer_image = $request->file('computer_image');
            $update->addMedia($computer_image)
                    ->usingName('Ad Website Computer')
                    ->toMediaCollection('adwebsite_computer');
                    
        }

        if($request->hasFile('mobile_image')){
            if($update->getMedia('adwebsite_mobile')){
                $update->clearMediaCollection('adwebsite_mobile');
            }
            $mobile_image = $request->file('mobile_image');
            $update->addMedia($mobile_image)
                    ->usingName('Ad Website Mobile')
                    ->toMediaCollection('adwebsite_mobile');
                    
        }

        return redirect()->route('website.index')->with('success','تم تعديل بيانات الاعلان للموقع بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
