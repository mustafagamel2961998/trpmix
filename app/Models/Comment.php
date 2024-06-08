<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'song_id',
        'comment',
    ];

       //start realtionships
        public function user(){
            return $this->belongsTo(User::class,'user_id','id');
        }
       
       //end realtionships
     
}
