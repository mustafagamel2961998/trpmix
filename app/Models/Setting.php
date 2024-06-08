<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Setting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable =[  
        'website_name',
        'website_descritpion',
        'website_keywords',
        'website_copy_right',
        // 'covers',
        'website_ads',
        'google_ads',
        'facebook',
        'youtube',
        'twitter',
        'user_website_navbar_bg',
        'user_website_bg',
        'user_website_content_bg',
    ];


    protected $casts = [
        'website_keywords' => 'array',
    ];


    public function registerMediaConversions(Media $media = null): void
    {
       
        $this->addMediaCollection('setting')
             ->useFallbackUrl('https://www12.0zz0.com/2023/10/20/05/999575722.png')
             ->useDisk('setting');
             
        
    }





    
}
