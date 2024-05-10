<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_from' => $this->user_id,
            'user_to' => $this->channel_id,
            'body' => $this->body,
            'time' => $this->created_at->diffForHumans(),
        ];
    }
}
