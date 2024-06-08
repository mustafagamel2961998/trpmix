<?php

use App\Http\Controllers\User\Api\AlbumController;
use App\Http\Controllers\User\Api\AuthController;
use App\Http\Controllers\User\Api\IndexController;
use App\Http\Controllers\User\Api\SingerController;
use App\Http\Controllers\User\Api\SingersController;
use App\Http\Controllers\User\Api\SongsController;
use App\Models\Singer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Guest Routes
    // index resource
    Route::post('/history/store',[IndexController::class,'historyStore'])
          ->name('history.store');
         // search
    Route::post('user/search',[IndexController::class,'userSearch'])
            ->name('user.search');  

    Route::apiResource('/',IndexController::class);

    // auth routes
    Route::post('login',[AuthController::class,'loginMethod'])->name('login');
    Route::post('register',[AuthController::class,'registerMethod'])->name('register');

    // singer resource
//      Route::get('home/singer/show/{id}/{slug}',[SingerController::class,'show'])
//      ->name('home.singer.show');
    Route::apiResource('/singer',SingerController::class);
    // album respurce
    Route::apiResource('/albums',AlbumController::class);
    // singers resource
    Route::apiResource('/singers',SingersController::class);
    // songs resource
    // Route::get('/songs/kind/{kind_name}',[SongsController::class,'kind']);
    Route::get('song/show/category/{id}',[SongsController::class,'showSongsCategory'])
          ->name('song.show.category');
    Route::post('song/like',[SongsController::class,'songLike'])
          ->name('song.like');      
    Route::apiResource('/songs',SongsController::class);
    Route::post('favorite/store',[AlbumController::class,'favoriteStore'])
           ->name('favorite.store');
//******************************************************************/




// User Authuntcation Routes
//******************************************************************/
Route::get('logout',function(){
      Auth::logout();
});


