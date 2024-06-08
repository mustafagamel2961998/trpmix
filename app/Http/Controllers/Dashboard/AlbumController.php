<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AlbumRequest;
use App\Models\Album;
use App\Models\Singer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::with('media','admin','singer')->latest('id')->paginate(10);
        return view('Admin.Dashboard.album.index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $singers = Singer::all();
        $album = new Album();
        return view('Admin.Dashboard.album.create',compact('album','singers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlbumRequest $request)
    {
        $request->merge([
            'admin_id'=>Auth::guard('admin')->user()->id,
            'slug'=>Str::slug($request->name),
        ]);
        $album = Album::create($request->all());
        if($request->hasFile('image')){
            $image = $request->file('image');
            $album->addMedia($image)
                    ->usingName($album->name)
                    ->toMediaCollection('album');
        }
        return redirect()->route('album.index')->with('success','تم إضافة الالبوم بنجاح');
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
    public function edit(Album $album)
    {
        $singers = Singer::all();
        return view('Admin.Dashboard.album.edit',compact('album','singers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlbumRequest $request, string $id)
    {
        $request->merge([
            'slug'=>Str::slug($request->name),
        ]);
        $update = Album::find($id);

        $update->update($request->all());

        if($request->hasFile('image')){
            if($request->hasFile('image')){
                if($update->getMedia('album')){
                    $update->clearMediaCollection('album');
                }
                $image = $request->file('image');
                $update->addMedia($image)
                        ->usingName($update->name)
                        ->toMediaCollection('album');
            }
        }
        return redirect()->route('album.index')->with('success','تم تعديل بيانات الالبوم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('album.index')->with('success','تم نقل الالبوم الي سلة المهملات بنجاح');

    }

    public function recycleBin(){
        $albums = Album::onlyTrashed()->with('media','admin','singer')->latest('id')->paginate(10);
        return view('Admin.Dashboard.album.recyclebin',compact('albums'));
    }
    public function restore($id){
        Album::onlyTrashed()->find($id)->restore();
        return redirect()->route('album.index')->with('success','تم استرجاع الالبوم بنجاح');
    }
    public function forceDelete($id){
        Album::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('album.index')->with('success','تم حذف الالبوم بنجاح');
    }
}
