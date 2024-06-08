<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SingerRequest;
use App\Models\Singer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Intl\Countries;
use Illuminate\Support\Str;
class SingerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $singers = Singer::with('media')->latest('id')->paginate(10);
        return view('Admin.Dashboard.singer.index',compact('singers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $singer = new Singer();
        $countries = Countries::getCountryCodes();
        return view('Admin.Dashboard.singer.create',compact('singer','countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SingerRequest $request)
    {   
        $request->merge([
            'admin_id'=>Auth::guard('admin')->user()->id,
            'slug'=>Str::slug($request->name),
        ]);
        $create = Singer::create($request->all());
        if($request->hasFile('image')){
            $image = $request->file('image');
            $create->addMedia($image)
                    ->usingName($create->name)
                    ->toMediaCollection('singer');
        }
        return redirect()->route('singer.index')->with('success','تم إضافة بيانات المطرب بنجاح');
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
    public function edit(Singer $singer)
    {
        $countries = Countries::getCountryCodes();
        return view('Admin.Dashboard.singer.edite',compact('singer','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SingerRequest $request, string $id)
    {
        $request->merge([
            'slug'=>Str::slug($request->name),
        ]);
        $update = Singer::find($id);
        $update->update($request->all());
        if($request->hasFile('image')){
            if($update->getMedia('singer')){
                $update->clearMediaCollection('singer');
            }
            $image = $request->file('image');
            $update->addMedia($image)
                    ->usingName($update->name)
                    ->toMediaCollection('singer');
        }
        return redirect()->route('singer.index')->with('success','تم تعديل بيانات المطرب بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $singer = Singer::find($id);
        $singer->albums()->delete();
        $singer->delete();
        return redirect()->route('singer.index')->with('success','تم نقل المطرب الي سلة المهملات بنجاح');
    }

    public function recycleBin(){
        $singers = Singer::onlyTrashed()->with('media')->latest('id')->paginate(10);
        return view('Admin.Dashboard.singer.recyclebin',compact('singers'));
    }
    public function restore($id){

        $singer = Singer::onlyTrashed()->find($id);
        $singer->albums()->onlyTrashed()->restore();
        $singer->restore();

        return redirect()->route('singer.index')->with('success','تم إسترجاع المطرب بنجاح');
    }
    public function forceDelete($id)  {
        $singer = Singer::onlyTrashed()->find($id);
        $singer->albums()->onlyTrashed()->forceDelete();
        $singer->forceDelete(); 
        return redirect()->route('singer.index')->with('success','تم حذف المطرب بنجاح');
    }
}
