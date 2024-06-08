<?php

namespace App\Http\Resources\User;

use App\Helpers\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SingerResource extends JsonResource
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
            'name'=>$this->name,
            'slug'=> $this->slug,
            'bio'=>$this->bio,
            'country'=>Country::countryCode($this->country_code),
            'status'=>$this->status,
            'single_status'=>$this->single_status,
            'created_at'=>$this->created_at->format('Y/m/d g:i A'),
            'updated_at'=>$this->updated_at->format('Y/m/d g:i A'),
            'media'=>[
                'photo'=>$this->getMedia('singer')
            ],
            'songs'=>$this->whenLoaded('songs'),
            'songs_count'=>$this->whenLoaded('songs')->count(),
        ];
    }
}
