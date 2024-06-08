<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingReauest;
use App\Http\Resources\User\CategoryResource;
use App\Http\Resources\User\IndexResource;
use App\Http\Resources\User\SettingResource;
use App\Http\Resources\User\SingerResource;
use App\Http\Resources\User\SongResource;
use App\Models\Adwebsite;
use App\Models\Album;
use App\Models\Category;
use App\Models\History;
use App\Models\Setting;
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
        $startOfWeek = Carbon::now()->subWeek()->startOfWeek();
        $endOfWeek = Carbon::now()->subWeek()->endOfWeek();


//**********************************************************************************// 
        // get website setting data
        $setting = Setting::with('media')->first();
//**********************************************************************************// 
        // get website ads covers slider
        $adWebsite = Adwebsite::with('media','song')->latest()->get();

//**********************************************************************************// 
        // get all by latest active singers for slider if filter request sent or not
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
         
// get latest 3 albums with media (Feature 3 albums)
         $getFeatureThreeAlbums =Album::where('status','active')->with('media')->latest()->take(3)->get();
        return response()->json([
            'settingData'=>new SettingResource($setting),
            'adWebsite'=>IndexResource::collection($adWebsite),
            'singers'=>SingerResource::collection($singers),
            'songs'=>SongResource::collection($weeklySongsList),
            'categories'=>CategoryResource::collection($getCategoriesForFilterNewSongs),
            'latest_songs'=>SongResource::collection($getLatestSongs),
            'feature_three_tlbums'=>$getFeatureThreeAlbums
        ],200);
        
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
        return response()->json([
            'status'=>'true',
        ]);
    }
  // search method
    public function userSearch(Request $request){
        $singers = Singer::active()->where('name','LIKE', "%{$request->keyword}%")->with('media')->get();
        $songs = Song::active()->where('title','LIKE', "%{$request->keyword}%")->with('media')->get();
        $albums = Album::active()->where('name','LIKE', "%{$request->keyword}%")->with('media')->get();
        return response()->json([
            'singers'=>$singers,
            'songs'=>$songs,
            'albums'=>$albums,
        ]);
    }
    
}
