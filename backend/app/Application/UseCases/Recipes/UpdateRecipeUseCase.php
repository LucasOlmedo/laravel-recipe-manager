<?php

namespace App\Application\UseCases\Recipes;

use App\Domain\Entities\Recipe;
use App\Domain\Repositories\RecipeRepositoryInterface;

class UpdateRecipeUseCase
{

    public function __construct(private RecipeRepositoryInterface $recipeRepository) {}

    public function execute(Recipe $recipe, array $data): Recipe
    {
        $recipe = $this->updateRecipeEntity($recipe, $data);
        return $this->recipeRepository->update($recipe);
    }

    private function updateRecipeEntity(Recipe $recipe, array $data): Recipe
    {
        $recipe->title = $data['title'] ?? $recipe->title;
        $recipe->description = $data['description'] ?? $recipe->description;
        $recipe->preparationTime = $data['preparation_time'] ?? $recipe->preparationTime;
        $recipe->steps = $data['steps'] ?? $recipe->steps;
        $recipe->ingredients = $data['ingredients'] ?? $recipe->ingredients;
        $recipe->tags = $data['tags'] ?? $recipe->tags;
        $recipe->imageUrl = $data['image_url'] ?? $recipe->imageUrl;
        return $recipe;
    }
}
