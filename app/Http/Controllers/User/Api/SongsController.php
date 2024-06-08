<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\SongResource;
use App\Models\Album;
use App\Models\Category;
use App\Models\Like;
use App\Models\Singer;
use App\Models\Song;
use App\Models\UserCookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class SongsController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public $getSongsSingers;
    public function __construct()
    {
        $this->getSongsSingers = collect();
    }
    public function index(Request $request)
    {
        $getCookie = Cookie::get('cookie_id');
        $albums = Album::with('media')->latest()->paginate(10);

        $historySongs = UserCookie::where('cookie_id',$getCookie)->with('histories.songs.singer')->first();
                    
        foreach($historySongs->histories as $history){
                $this->getSongsSingers->push($history->songs->singer);
        }
       $singers = $this->getSongsSingers->groupBy('name');
       $AllSongs = Song::where('status','active')->with('media','singer')->filter($request->query())->get();
       
        return response()->json([
            'albums'=>$albums,
            'historySongs'=>$historySongs,
            'singers'=>$singers,
            'AllSongs'=>$AllSongs,
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
        $othersSingers = Singer::where('id','<>',$id)->with('media')->active()->take(6)->get();
        $song = Song::with('media','singer','album','category','comments')->withCount('likes')->with(['likes'=>fn($q)=>$q->where('user_id',Auth::id())])->find($id);
        $singerHighListenSongs = Singer::with(['songs'=>fn($q)=>$q->orderBy('listen_count','DESC')->with('media')])->find($song->singer_id);

        return response()->json([
            'song'=>$song,
            'singerHighListenSongs'=>$singerHighListenSongs,
            'othersSingers'=>$othersSingers
        ]);
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
    // public function kind($kind_name){

    //     $getCookie = Cookie::get('cookie_id');
    //     $albums = Album::with('media')->latest()->paginate(10);


    //     $historySongs = UserCookie::where('cookie_id',$getCookie)->with('histories.songs.singer')->first();
                

    //     foreach($historySongs->histories as $history){
    //          $this->getSongsSingers->push($history->songs->singer);
    //     }
    //     $singers = $this->getSongsSingers->groupBy('name');
    //     $songsByKind= Song::with('media','singer')->where('kind',$kind_name)->get();

    //     return response()->json([
    //         'albums'=>$albums,
    //         'historySongs'=>$historySongs,
    //         'singers'=>$singers,
    //         'songsByKind'=>$songsByKind,
    //     ],200);

    // }

     // get songs by category
     public function showSongsCategory($id){
        $getCookie = Cookie::get('cookie_id');
        $albums = Album::with('media')->latest()->paginate(10);

        $historySongs = UserCookie::where('cookie_id',$getCookie)->with('histories.songs.singer')->first();
                

        foreach($historySongs->histories as $history){
             $this->getSongsSingers->push($history->songs->singer);
        }
        $singers = $this->getSongsSingers->groupBy('name');
        $songsByCategory = Category::with('songs')->first();
        return response()->json([
            'albums'=>$albums,
            'historySongs'=>$historySongs,
            'singers'=>$singers,
            'songsByCategory'=>$songsByCategory,
        ],200);
    }

    public function songLike(Request $request){
        // Check if song has like from current user
        $check = Like::where('user_id',Auth::id())->where('song_id',$request->id)->first();
        if($check){
            $check->delete();
        }else{
            $create = Like::create([
                'user_id'=>Auth::id(),
                'song_id'=>$request->id
            ]);
        }
        

        return response()->json([
            'message'=>'تم عمل لايك بنجاح'
        ]);
    }
}
