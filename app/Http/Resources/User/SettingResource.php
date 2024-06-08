<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id'=>$this->id,
            'website_name'=>$this->website_name,
            'website_descritpion'=>$this->website_descritpion,
            'website_keywords'=>$this->website_keywords,
            'website_copy_right'=>$this->website_copy_right,
            'website_ads_status'=>$this->website_ads,
            'google_ads_status'=>$this->google_ads,
            'facebook'=>$this->facebook,
            'youtube'=>$this->youtube,
            'twitter'=>$this->twitter,
            'user_website_navbar_bg'=>$this->user_website_navbar_bg,
            'user_website_bg'=>$this->user_website_bg,
            'user_website_content_bg'=>$this->user_website_content_bg,
            'created_at'=>$this->created_at->format('Y/m/d g:i A'),
            'updated_at'=>$this->updated_at->format('Y/m/d g:i A'),
            'media'=> [
                'website_logo'=>$this->getMedia('setting')
            ],
        ];
    }
}
