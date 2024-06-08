<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Adwebsite extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable =[
        'song_id',
        'pin',
    ];

    //start realtionships
    public function song(){
        return $this->belongsTo(Song::class,'song_id','id');
    }
    //end realtionships

       

    public function registerMediaConversions(Media $media = null): void
    {
       
        $this->addMediaCollection('adwebsite_logo')
             ->useFallbackUrl('https://www4.0zz0.com/2023/10/24/16/269484377.png')
             ->useDisk('adwebsite');

        $this->addMediaCollection('adwebsite_computer')
             ->useFallbackUrl('https://www6.0zz0.com/2023/10/24/16/296577140.png')
             ->useDisk('adwebsite');

       $this->addMediaCollection('adwebsite_mobile')
             ->useFallbackUrl('https://www4.0zz0.com/2023/10/24/16/674395722.png')
             ->useDisk('adwebsite');
                  
        
    }
}
