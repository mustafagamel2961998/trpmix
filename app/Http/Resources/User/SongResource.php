<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SongResource extends JsonResource
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
            'title'=>$this->title,
            'slug'=>$this->slug,
            'words'=>$this->words,
            'listen_link'=>$this->listen_link,
            'download_link'=>$this->download_link,
            'album'=>$this->whenLoaded('album'),
            'singer'=>$this->whenLoaded('singer'),
            'duet_singer'=>$this->whenLoaded('duet'),
            'category'=>$this->whenLoaded('category'),
            'year'=>$this->year,
            'song_time'=>$this->time,
            'kind'=>$this->kind,
            'status'=>$this->status,
            'created_at'=>$this->created_at->format('Y/m/d g:i A'),
            'updated_at'=>$this->updated_at->format('Y/m/d g:i A'),
            'media'=>[
                'photo'=>$this->getMedia('song')
            ],
        ];
    }
}
