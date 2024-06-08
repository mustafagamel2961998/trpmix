<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SongRequest;
use App\Models\Album;
use App\Models\Category;
use App\Models\Like;
use App\Models\Singer;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::latest()->paginate(10);
        return view('Admin.Dashboard.song.index',compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $song = new Song();
        $albums = Album::latest()->get();
        $singers = Singer::latest()->get();// singers and dute singers
        $categories = Category::latest()->get();
        return view('Admin.Dashboard.song.create',compact('song','albums','singers','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SongRequest $request)
    {
        $singerName = Singer::where('name', 'like', '%' . $request->singer_name . '%')->first();
        if($request->album_name){
            $getAlbumName = Album::where('name', 'like', '%' . $request->album_name . '%')->first();
            $request->merge([
                'album_id'=>$getAlbumName->id,
            ]); 
        }
        if($request->singer_duet_name){
            $singerDueName = Singer::where('name', 'like', '%' . $request->singer_duet_name . '%')->first();
            $request->merge([
                'singer_duet_id'=>$singerDueName->id,
            ]); 
        }


        $request->merge([
            'admin_id'=>Auth::guard('admin')->user()->id,
            'slug'=>Str::slug($request->title),
            'singer_id'=>$singerName->id,
            // 'singer_duet_id'=>$request->singer_duet_id,
        ]);
        $create = Song::create($request->all());
        if($request->hasFile('image')){
            $image = $request->file('image');
            $create->addMedia($image)
                    ->usingName($create->title)
                    ->toMediaCollection('song');
        }
        return redirect()->route('song.index')->with('success','تم إضافة الاغنية بنجاح');

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
    public function edit(Song $song)
    {
        $albums = Album::latest()->get();
        $singers = Singer::latest()->get();// singers and dute singers
        $categories = Category::latest()->get();
        return view('Admin.Dashboard.song.edite',compact('song','albums','singers','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SongRequest $request, string $id)
    {
      
        $singerName = Singer::where('name', 'like', '%' . $request->singer_name . '%')->first();
        if($request->singer_duet_name){
            $singerDueName = Singer::where('name', 'like', '%' . $request->singer_duet_name . '%')->first();
            $request->merge([
                'singer_duet_id'=>$singerDueName->id,
            ]); 
        }


        $request->merge([
            'slug'=>Str::slug($request->title),
            'singer_id'=>$singerName->id,
        ]);
        $update = Song::find($id);
        $update->update($request->all());
        if($request->hasFile('image')){
            if($update->getMedia('song')){
                $update->clearMediaCollection('song');
            }
            $image = $request->file('image');
            $update->addMedia($image)
                    ->usingName($update->title)
                    ->toMediaCollection('song');
        }
        return redirect()->route('song.index')->with('success','تم تعديل بيانات الاغنية بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Song::find($id);
        $delete->delete();
        return redirect()->route('song.index')->with('success','تم نقل الاغنية الي سلة المهملات بنجاح');
    }

    public function recycleBin(){
        $songs = Song::onlyTrashed()->paginate(10);
        return view('Admin.Dashboard.song.recycle',compact('songs'));
    }
    public function restore($id){
        Song::onlyTrashed()->find($id)->restore();
        return redirect()->route('song.index')->with('success','تم استرجاع الاغنية بنجاح');
    }
    public function forceDelete($id){
        $delete = Song::onlyTrashed()->find($id);
      	$delete->forceDelete();
        return redirect()->route('song.index')->with('success','تم حذف الاغنية نهائي بنجاح');
    }

  
}
