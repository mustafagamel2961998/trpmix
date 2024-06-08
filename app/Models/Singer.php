<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class Singer extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia,SoftDeletes;
    protected $fillable =[
        'admin_id',  
        'name',
        'slug',
        'bio',
        'country_code',
        'status',
        'single_status',
    ];

    //start realtionships
    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id','id');
    }
    public function albums(){
        return $this->hasMany(Album::class,'singer_id','id');
    }
    public function songs(){
        return $this->hasMany(Song::class,'singer_id','id');
    }
    public function duet(){
        return $this->hasMany(Song::class,'singer_duet_id','id');
    }
    // end relationships

    // start local scope
    public function scopeActive(Builder $builder){
        $builder->whereStatus('active');
    }
    public function scopeFilter(Builder $builder,$filter){
        $filterOptions = array_merge([
            'single_status' => null,
        ], $filter);
        $builder->when($filterOptions['single_status'],function(Builder $builder,$value){
            $builder->where('single_status',$value);
        });
        
    }
    // end local scope
    public function registerMediaConversions(Media $media = null): void
    {
       
        $this->addMediaCollection('singer')
             ->useFallbackUrl('https://www3.0zz0.com/2023/10/20/05/777624830.png')
             ->useDisk('singer');
             
        
    }

}
