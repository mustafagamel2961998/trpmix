<?php

use App\Http\Controllers\Dashboard\SongController;
use App\Http\Controllers\User\AlbumController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\SingerController;
use App\Http\Controllers\User\SingersController;
use App\Http\Controllers\User\SongsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




// Guest route
    // index resource
    Route::resource('/',IndexController::class);
    // search
    Route::post('user/search',[IndexController::class,'userSearch'])
          ->name('user.search');  
    // auth routes
    Route::post('login',[AuthController::class,'loginMethod'])->name('login');
    Route::post('register',[AuthController::class,'registerMethod'])->name('register');

    //history store method
    Route::post('/history/store',[IndexController::class,'historyStore'])
          ->name('history.store');
    // singer resource
    Route::get('home/singer/show/{id}/{slug}',[SingerController::class,'show'])
          ->name('home.singer.show');
    Route::resource('/singer',SingerController::class)->except('show');
    // album resource
    Route::get('home/album/show/{id}/{slug}',[AlbumController::class,'show'])
          ->name('home.album.show');
    Route::post('favorite/store',[AlbumController::class,'favoriteStore'])
          ->name('favorite.store');
    Route::resource('/albums',AlbumController::class)->except('show');
    // singers resource
    Route::resource('singers',SingersController::class);

    // song resource
    Route::get('song/show/category/{id}',[SongsController::class,'showSongsCategory'])
            ->name('song.show.category');
    Route::get('home/song/show/{id}/{slug}',[SongsController::class,'show'])
            ->name('song.show');
    Route::post('song/like',[SongsController::class,'songLike'])
            ->name('song.like');
    Route::post('song/comment/{id}',[SongsController::class,'songComment'])
            ->name('song.comment');        
    Route::resource('/songs',SongsController::class)->except('show');


 
 
            
//******************************************************************/

Route::get('logout',function(){
      Auth::logout();
      return redirect()->route('index');
})->name('user.logout');



















// Auth route

//******************************************************************/


// Authuntcation ( User ) Route

//******************************************************************/





?>