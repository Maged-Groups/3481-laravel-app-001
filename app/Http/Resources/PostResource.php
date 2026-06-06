<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID' => $this->id,
            'Title' => $this->title,
            'Content' => $this->body,
            'Posted on' => $this->created_at->format('D d F y'),
            'Posted at' => $this->created_at->format('h:i:s a'),
            'Posted since' => $this->created_at->diffforhumans(),
            // 'By' => new UserResource($this->user),
            'By' =>  UserResource::make($this->whenLoaded('user')),
            'Post Status' => PostStatusResource::make($this->whenLoaded('postStatus')),
            'Comments' => CommentResource::collection($this->whenLoaded('comments'))
        ];
    }
}
