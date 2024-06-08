<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
class UserCookie extends Model
{
    use HasFactory;
    public $timestamps = false;
    // public $incrementing = false;
    protected $fillable = [
        // 'id',
        'cookie_id',
    ];

    // start observe scope
    // public static function booted()
    // {

    //     static::creating(fn(UserCookie $userCookie)=> $userCookie->id = UserCookie::getCookieId());
       
    // }
    // end observe scope

    // start relationships
       public function histories(){
        return $this->hasMany(History::class,'user_cookie_id','id');
       } 
    // end relationships
    
    // set cookie id
    // protected static function getCookieId()
    // {
    //     $cookie_id = Cookie::get('cookie_id');
    //     if (!$cookie_id) {
    //             $cookie_id = Str::uuid();
    //     }
    //     return $cookie_id;
    // }

}
