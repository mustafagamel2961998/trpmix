<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, InteractsWithMedia,HasRoles;

    protected $fillable =[
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'online',
        'status',
    ];

    //start realtionships
    public function singers(){
        return $this->hasMany(Singer::class,'admin_id','id');
    }
    public function albums(){
        return $this->hasMany(Album::class,'admin_id','id');
    }
    public function songs(){
        return $this->hasMany(Song::class,'admin_id','id');
    }
    // end relationships
    protected $hidden = [
        'password',
    ];
    public function registerMediaConversions(Media $media = null): void
    {
       
        $this->addMediaCollection('admin')
             ->useFallbackUrl('https://www10.0zz0.com/2023/10/18/18/863388027.png')
             ->useDisk('admin');
             
        
    }
}
