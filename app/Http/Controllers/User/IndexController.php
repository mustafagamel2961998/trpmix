<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Category;
use App\Models\History;
use App\Models\Singer;
use App\Models\Song;
use App\Models\UserCookie;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

//**********************************************************************************// 
        // get all by latest active singers for slider with filter if filter request sent or not
        $singers = Singer::active()->filter($request->query())->with('media','songs')->latest()->get();

//**********************************************************************************// 
        // get weekly songs list  by latest 
        $weeklySongsList = Song::with('media','album','singer','duet','category')->whereBetween('created_at',[
                $startOfWeek,
                $endOfWeek
            ])->latest()->take(10)->get();

//**********************************************************************************// 
         // get all cateogries for filter latest 12 songs  
         $getCategoriesForFilterNewSongs = Category::latest()->get();



//**********************************************************************************// 
         // get latest 12 songs with filter if filter request sent or not
         $getLatestSongs = Song::with('media','album','singer','duet','category')->CategoryFilter($request->query())->latest()->get();


//**********************************************************************************// 
         // get latest 3 albums with media (Feature 3 albums)
         $getFeatureThreeAlbums =Album::where('status','active')->with('media')->latest()->take(3)->get();
         return view('User.index',compact('singers','weeklySongsList','getCategoriesForFilterNewSongs','getLatestSongs','getFeatureThreeAlbums'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function historyStore(Request $request){
        $get_cookie_id = Cookie::get('cookie_id');
        $getId = UserCookie::where('cookie_id',$get_cookie_id)->first();
        $checkSongsIfExist = History::where('user_cookie_id',$getId->id)->where('song_id',$request->id)->first();
        if(!$checkSongsIfExist){
            History::create([
                'user_cookie_id'=>$getId->id,
                'song_id'=>$request->id,
            ]);
        }
        $incrementSongListenCount = Song::find($request->id);
        $incrementSongListenCount->increment('listen_count');
        return 'done';
    }

    // search method
    public function userSearch(Request $request){
        $singers = Singer::active()->where('name','LIKE', "%{$request->keyword}%")->with('media')->get();
        $songs = Song::active()->where('title','LIKE', "%{$request->keyword}%")->with('media')->get();
        $albums = Album::active()->where('name','LIKE', "%{$request->keyword}%")->with('media')->get();

        return view('User.search',compact('singers','songs','albums'));
    }
}
