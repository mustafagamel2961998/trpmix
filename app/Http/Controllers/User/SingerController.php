<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
    public function show(string $id,string $slug)
    {
        $singer = Singer::with(['songs'=>fn($q)=>$q->orderBy('listen_count','DESC')->whereNotNull('singer_duet_id','<>',null)->with('media')->take(12),'media'])->find($id);
        $singerSingleSongs = Singer::with(['songs'=>fn($q)=>$q->whereNull('album_id')->with('media')->take(12)])->find($id);
        $singerHighListenSongs = Singer::with(['songs'=>fn($q)=>$q->orderBy('listen_count','DESC')->with('media')])->find($id);
        $othersSingers = Singer::where('id','<>',$id)->with('media')->active()->take(6)->get();
        return view('User.singer.show',compact('singer','singerSingleSongs','singerHighListenSongs','othersSingers'));
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
}
