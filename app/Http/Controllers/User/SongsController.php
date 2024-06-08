<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Singer;
use App\Models\Song;
use App\Models\UserCookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Termwind\Components\Raw;

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
        $getCategoriesForSongsCategories = Category::latest()->get();

        $historySongs = UserCookie::where('cookie_id',$getCookie)->with('histories.songs.singer')->first();
   
        foreach($historySongs->histories as $history){
            $this->getSongsSingers->push($history->songs->singer);
        }
        
        $singers = $this->getSongsSingers->groupBy('name');
        $AllSongs= Song::where('status','active')->with('media','singer')->filter($request->query())->latest()->get();

        return view('User.songs.index',compact('albums','historySongs','singers','AllSongs','getCategoriesForSongsCategories'));
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

        // $singer = Singer::with(['songs'=>fn($q)=>$q->whereNotNull('singer_duet_id','<>',null)->with('media'),'media'])->find($id);
        // $singerSingleSongs = Singer::with(['songs'=>fn($q)=>$q->whereNull('singer_duet_id')->with('media')->take(12)])->find($id);
        $othersSingers = Singer::where('id','<>',$id)->with('media')->active()->take(6)->get();
        $song = Song::with('media','singer','album','category','comments')->withCount('likes')->with(['likes'=>fn($q)=>$q->where('user_id',Auth::id())])->find($id);
        $song->increment('listen_count');
        $singerHighListenSongs = Singer::with(['songs'=>fn($q)=>$q->orderBy('listen_count','DESC')->with('media')])->find($song->singer_id);

        return view('User.songs.show',compact('song','singerHighListenSongs','othersSingers'));
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
    // public function kind($kind_name){

    //     $getCookie = Cookie::get('cookie_id');
    //     $albums = Album::with('media')->latest()->paginate(10);


    //     $historySongs = UserCookie::where('cookie_id',$getCookie)->with('histories.songs.singer')->first();
                

    //     foreach($historySongs->histories as $history){
    //          $this->getSongsSingers->push($history->songs->singer);
    //     }
    //     $singers = $this->getSongsSingers->groupBy('name');
    //     $songsByKind= Song::with('media','singer')->where('kind',$kind_name)->get();


    //     return view('User.kind.show',compact('singers','historySongs','songsByKind'));
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
        $songsByCategory = Category::where('id',$id)->with(['songs'=>fn($q)=>$q->latest()])->first();

        return view('User.category.show',compact('albums','historySongs','singers','songsByCategory'));
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

    public function songComment(Request $request,$id){
        $request->validate([
            'comment'=>['required','string','max:255'],
        ],[
            'comment.required'=>'حقل التعليق مطلوب',
            'comment.string'=>'يجب أن يكون حقل التعليق نصي',
            'comment.max'=>'يجب أن يكون حقل التعليق يتراوح بين 1 الي 255 حرف'
        ]);

        Comment::create([
            'user_id'=>Auth::id(),
            'song_id'=>$id,
            'comment'=>$request->comment,
        ]);
        return redirect()->back()->with('success','تم اضافة التعليق بنجاح');    
    }
}
