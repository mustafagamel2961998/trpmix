<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\SingerResource;
use App\Models\Singer;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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


        $singer = Singer::with('songs.media','media')->find($id);
        $singerSingleSongs = Singer::with(['songs'=>fn($q)=>$q->whereNull('singer_duet_id')->with('media')])->find($id);
        $singerHighListenSongs = Singer::with(['songs'=>fn($q)=>$q->orderBy('listen_count','DESC')->with('media')])->find($id);
        $othersSingers = Singer::where('id','<>',$id)->with('media')->active()->take(6)->get();

        return response()->json([
            'singer'=>new SingerResource($singer),
            'singerSingleSongs'=>new SingerResource($singerSingleSongs),
            'singerHighListenSongs'=>new SingerResource($singerHighListenSongs),
            'othersSingers'=>SingerResource::collection($othersSingers),
        ],200);
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
