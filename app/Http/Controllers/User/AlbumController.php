<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Song;
use App\Models\UserCookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $getSongsSingers;
    public $songsKind;
    public function __construct()
    {
        $this->getSongsSingers = collect();
        $this->songsKind = collect();
    }

    public function index(Request $request)
    {
        // Auth::logout();
        $getCookie = Cookie::get('cookie_id');
        $albums = Album::with('media')->withCount('songs')->withCount('favorites')->filter($request->query())->latest()->paginate(10);


       $historySongs = UserCookie::where('cookie_id',$getCookie)->with('histories.songs.singer')->first();
                

        foreach($historySongs->histories as $history){
          
             $this->getSongsSingers->push($history->songs->singer);
           
        }

        $singers = $this->getSongsSingers->groupBy('name');
   

        return view('User.album.index',compact('albums','historySongs','singers'));
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
    public function show(string $id,$slug)
    {
        $getCategoriesForSongsCategories = Category::latest()->get();
        $getCookie = Cookie::get('cookie_id');
        $historySongs = UserCookie::where('cookie_id',$getCookie)->with('histories.songs.singer')->first();
   
        foreach($historySongs->histories as $history){
            $this->getSongsSingers->push($history->songs->singer);
        }
        
        $singers = $this->getSongsSingers->groupBy('name');
        $album = Album::with('songs.media')->find($id);
        foreach($album->songs as $getKind){
            $this->songsKind->push($getKind->kind);
        }
        $albumKindSongs = Song::with('media')->whereIn('kind',$this->songsKind)->get();
        $albumSingerAlbums = Album::where('id',$album->singer_id)->with('media')->get();
        if($album){
            Album::find($id)->increment('view');
        }
        return view('User.album.show',compact('album','getCategoriesForSongsCategories','singers','historySongs','albumKindSongs','albumSingerAlbums'));
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

    public function favoriteStore(Request $request){
        $chechIFExistWithCurrentUser = Favorite::where('user_id',Auth::id())->where('album_id',$request->id)->first();
        if($chechIFExistWithCurrentUser){
            return response()->json([
                'message'=>'تم إضافة الالبوم الي المفضلات من قبل' 
            ]);
        }
        Favorite::create([
            'user_id'=>Auth::id(),
            'album_id'=>$request->id,
        ]);
        return response()->json([
            'message'=>'تم إضافة الالبوم الي المفضلات'
        ]);
    }
}
