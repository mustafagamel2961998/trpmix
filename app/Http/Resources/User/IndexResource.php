<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'pin'=>$this->pin,
            'created_at'=>$this->created_at->format('Y/m/d g:i A'),
            'updated_at'=>$this->updated_at->format('Y/m/d g:i A'),
            'song_data'=>$this->whenLoaded('song'),
            'media'=>[
                'logo_ad_image'=>$this->getMedia('adwebsite_logo'),
                'computer_ad_image'=>$this->getMedia('adwebsite_computer'),
                'mobile_ad_image'=>$this->getMedia('adwebsite_mobile')
            ],
        ];
    }
}
