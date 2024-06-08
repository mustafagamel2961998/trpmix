<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\SingerResource;
use App\Models\Album;
use App\Models\Singer;
use App\Models\UserCookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SingersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $getSongsSingers;
    public function __construct()
    {
        $this->getSongsSingers = collect();
    }
    public function index()
    {
        $getCookie = Cookie::get('cookie_id');
        $albums = Album::with('media')->latest()->paginate(10);

        $historySongs = UserCookie::where('cookie_id',$getCookie)->with('histories.songs.singer')->first();
                    
        foreach($historySongs->histories as $history){
            
                $this->getSongsSingers->push($history->songs->singer);
            
        }

       $singers = $this->getSongsSingers->groupBy('name');
       
       $AllSingers = Singer::where('status','active')->with('media')->get();
        return response()->json([
            'albums'=>$albums,
            'historySongs'=>$historySongs,
            'singers'=>$singers,
            'AllSingers'=>SingerResource::collection($AllSingers),
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
}
