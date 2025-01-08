<?php

namespace App\Application\UseCases\Recipes;

use App\Domain\Entities\Recipe;
use App\Domain\Repositories\RecipeRepositoryInterface;

class CreateRecipeUseCase
{
    public function __construct(private RecipeRepositoryInterface $recipeRepository) {}

    public function execute(array $data)
    {
        $recipe = $this->createRecipeEntity($data);
        return $this->recipeRepository->save($recipe);
    }

    private function createRecipeEntity(array $data)
    {
        return new Recipe(
            id: null,
            user_id: 1, // futurely will be the authenticated user
            title: $data['title'],
            description: $data['description'] ?? null,
            preparationTime: $data['preparation_time'] ?? null,
            steps: $data['steps'],
            ingredients: $data['ingredients'],
            tags: $data['tags'] ?? [],
            imageUrl: $data['image_url'] ?? null,
            integration: $data['integration'] ?? null,
            integrationRefId: $data['integration_ref_id'] ?? null
        );
    }
}
