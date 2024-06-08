<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Album extends Model implements HasMedia
{
    use HasFactory,SoftDeletes,InteractsWithMedia;

    protected $fillable =[
        'admin_id',
        'singer_id',
        'name',
        'slug',
        'album_download_link',
        'view',
        'status',

    ];

    //start realtionships
    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id','id')
               ->withDefault();
    }
    public function singer()  {
        return $this->belongsTo(Singer::class,'singer_id','id')
               ->withDefault(['name'=>'-']);
    }
    
    public function songs(){
        return $this->hasMany(Song::class,'album_id','id');
    }
    public function favorites(){
        return $this->hasMany(Favorite::class,'album_id','id');
    }
    
    //end realtionships

    // start local scope
        public function scopeActive(Builder $builder){
            $builder->whereStatus('active');
        }
        // album filter by year
        public function scopeFilter(Builder $builder,$filterByYear){
            $filterOptions = array_merge([
                'created_at' => null,
            ], $filterByYear);
            
            $builder->when($filterOptions['created_at'],function(Builder $builder,$value){
                $builder->whereYear('created_at',$value);
            });
            
        }
    //end local scope 

    public function registerMediaConversions(Media $media = null): void
    {
       
        $this->addMediaCollection('album')
             ->useFallbackUrl('https://www8.0zz0.com/2023/10/21/10/970460381.png')
             ->useDisk('album');
             
        
    }


}
