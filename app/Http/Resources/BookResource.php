<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'ISBN' => $this->ISBN,
            'author' => $this->author,
            'publicationYear' => $this->publicationYear,
            'publisher' => $this->publisher,
            'image' => $this->image,
            'subscriptionStatus' => $this->subscriptionStatus,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
