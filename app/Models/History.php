<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_cookie_id',
      'song_id'
    ];

     // start relationships
     public function cookie(){
        return $this->belongsTo(UserCookie::class,'user_cookie_id','id');
     } 
     public function songs(){
        return $this->belongsTo(Song::class,'song_id','id');
     } 
     // end relationships
  
}
