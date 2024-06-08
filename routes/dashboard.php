<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AdvertisementWebsiteController;
use App\Http\Controllers\Dashboard\AlbumController;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\indexController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\SingerController;
use App\Http\Controllers\Dashboard\SongController;
use App\Http\Controllers\Dashboard\UserController;
use App\Models\Album;
use App\Models\Singer;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


Route::get('singer/id/search/{name}',function($name){
       
       $singerId = Singer::select('id','name')->where('name', 'like', '%' . $name . '%')->get();
       return response()->json([
              'data'=>$singerId,
       ]);
});
Route::get('/album/name/search/{name}',function($name){
       
       $albumId = Album::select('id','name')->where('name', 'like', '%' . $name . '%')->get();
       return response()->json([
              'data'=>$albumId,
       ]);
});


//Dashboard Routes


// Auth Routes
Route::get('dashboard/login',[AuthController::class,'login'])
       ->name('dashboard.login.view');
Route::post('dashboard/login',[AuthController::class,'loginMethod'])
       ->name('dashboard.login.method');

//******************************************************************/

// Dashboard (Controle panel) Routes
Route::group(['prefix'=>'dashboard','middleware'=>'auth.admin'],function(){
       


       //dashboard
       Route::resource('/index',indexController::class);
       //admin
       Route::resource('admin',AdminController::class);
       //user
       Route::resource('/user',UserController::class);
       //setting
       Route::resource('/setting',SettingController::class);
       // singer
       Route::resource('/singer',SingerController::class);
       Route::get('/singer/recycle/bin',[SingerController::class,'recycleBin'])
              ->name('singer.recycle.view');
       Route::post('/singer/restore/{id}',[SingerController::class,'restore'])
              ->name('singer.restore');              
       Route::delete('/singer/force/delete/{id}',[SingerController::class,'forceDelete'])
              ->name('singer.force.delete');

       // album
       Route::resource('album',AlbumController::class);
       Route::get('album/recycle/bin',[AlbumController::class,'recycleBin'])
              ->name('album.recycle.view');
       Route::post('album/restore/{id}',[AlbumController::class,'restore'])
              ->name('album.restore');
       Route::delete('album/force/delete/{id}',[AlbumController::class,'forceDelete'])
              ->name('album.force.delete');

       
       Route::get('song/recycle/bin',[SongController::class,'recycleBin'])
              ->name('song.recycle.bin.view');
       Route::post('song/recycle/restore/{id}',[SongController::class,'restore'])
              ->name('song.recycle.restore');
  	   Route::delete('/song/force/delete/{id}',[SongController::class,'forceDelete'])
              ->name('song.force.delete');
       Route::resource('song',SongController::class)->except('show');
    
              
       // category
       Route::resource('category',CategoryController::class);

       // Advertisement website
       Route::resource('advertisement/website',AdvertisementWebsiteController::class);


       Route::post('admin/logout',[indexController::class,'logout'])
              ->name('admin.logout');
});
