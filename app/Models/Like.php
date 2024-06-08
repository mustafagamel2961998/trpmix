<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'song_id'
      ];


    //start realtionships
     public function song(){
        return $this->belongsTo(Like::class,'song_id','id');
     }
    //end realtionships
}
