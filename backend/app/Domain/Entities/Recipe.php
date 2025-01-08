<?php

namespace App\Domain\Entities;

class Recipe
{
    public ?int $id;
    public int $user_id;
    public string $title;
    public ?string $description;
    public ?int $preparationTime;
    public array $steps;
    public array $ingredients;
    public ?array $tags;
    public ?string $imageUrl;
    public ?string $integration;
    public ?string $integrationRefId;

    public function __construct(
        ?int $id,
        int $user_id,
        string $title,
        ?string $description,
        ?int $preparationTime,
        array $steps,
        array $ingredients,
        ?array $tags,
        ?string $imageUrl,
        ?string $integration,
        ?string $integrationRefId
    ) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->description = $description;
        $this->preparationTime = $preparationTime;
        $this->steps = $steps;
        $this->ingredients = $ingredients;
        $this->tags = $tags;
        $this->imageUrl = $imageUrl;
        $this->integration = $integration;
        $this->integrationRefId = $integrationRefId;
    }
}
