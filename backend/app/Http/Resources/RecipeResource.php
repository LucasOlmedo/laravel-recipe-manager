<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
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
            'user_id' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'preparation_time' => $this->preparationTime,
            'steps' => $this->steps,
            'ingredients' => $this->ingredients,
            'tags' => $this->tags,
            'image_url' => $this->imageUrl,
            'integration' => $this->integration,
            'integration_ref_id' => $this->integrationRefId,
        ];
    }
}
