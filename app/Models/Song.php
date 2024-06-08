<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class Song extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia,SoftDeletes;
    protected $fillable =[
        'title',
        'slug',
        'words',
        'listen_link',
        'download_link',
        'album_id',
        'singer_id',
        'singer_duet_id',
        'admin_id',
        'category_id',
        'year',
        'time',
        'kind',
        'listen_count',
        'status'
    ];
  


        //start realtionships
        public function Adwebsites(){
            return $this->hasMany(Adwebsite::class,'song_id','id');
        }
        public function album(){
            return $this->belongsTo(Album::class,'album_id','id')->withDefault(['name'=>null]);
        }
        public function singer(){
            return $this->belongsTo(Singer::class,'singer_id','id')->withDefault(['name'=>'-']);
        }
        public function admin(){
            return $this->belongsTo(Admin::class,'admin_id','id')->withDefault(['name'=>'-']);
        }
        public function category(){
            return $this->belongsTo(Category::class,'category_id','id')->withDefault(['name'=>'-']);
        }
        public function duet(){
            return $this->belongsTo(Singer::class,'singer_duet_id','id')->withDefault(['name'=>null]);
        }
        public function histories(){
            return $this->hasMany(History::class,'song_id','id');
        }
        public function likes(){
            return $this->hasMany(Like::class,'song_id','id');
        }
        public function comments(){
            return $this->hasMany(Comment::class,'song_id','id')->latest();
        }
       //end realtionships
    
       // start local scope
        public function scopeActive(Builder $builder){
            $builder->whereStatus('active');
        }
        // category_filter
        public function scopeCategoryFilter(Builder $builder,$filterByCategory){
            $filterOptions = array_merge([
                'category_id' => null,
            ], $filterByCategory);
            
            $builder->when($filterOptions['category_id'],function(Builder $builder,$value){
                $builder->where('category_id',$value);
            });
            
        }
         // song filter by year
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
       
        $this->addMediaCollection('song')
             ->useFallbackUrl('https://www4.0zz0.com/2023/10/24/18/735937862.png')
             ->useDisk('song');
             
    }

}
