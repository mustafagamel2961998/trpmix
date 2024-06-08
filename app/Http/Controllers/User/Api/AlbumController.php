<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Category;
use App\Models\Favorite;
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
    public function __construct()
    {
        $this->getSongsSingers = collect();
    }
    public function index(Request $request)
    {
        $getCookie = Cookie::get('cookie_id');
        $albums = Album::with('media')->latest()->filter($request->query())->paginate(10);

        $historySongs = UserCookie::where('cookie_id',$getCookie)->with('histories.songs.singer')->first();
                    
        foreach($historySongs->histories as $history){
            
                $this->getSongsSingers->push($history->songs->singer);
            
        }

       $singers = $this->getSongsSingers->groupBy('name');
   
        return response()->json([
            'albums'=>$albums,
            'historySongs'=>$historySongs,
            'singers'=>$singers,
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
        $getCategoriesForSongsCategories = Category::latest()->get();
        $getCookie = Cookie::get('cookie_id');
        $historySongs = UserCookie::where('cookie_id',$getCookie)->with('histories.songs.singer')->first();
   
        foreach($historySongs->histories as $history){
            $this->getSongsSingers->push($history->songs->singer);
        }
        $singers = $this->getSongsSingers->groupBy('name');
        $album = Album::with('songs.media')->find($id);
        if($album){
            Album::find($id)->increment('view');
        }
        return response()->json([
            'album'=>$album,
            'getCategoriesForSongsCategories'=>$getCategoriesForSongsCategories,
            'singers'=>$singers,
            'historySongs'=>$historySongs
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
