<?php

namespace App\Application\UseCases\Recipes;

use App\Domain\Entities\Recipe;
use App\Domain\Repositories\RecipeRepositoryInterface;

class UpdateRecipeUseCase
{

    public function __construct(private RecipeRepositoryInterface $recipeRepository) {}

    public function execute(Recipe $recipe, array $data): Recipe
    {
        return $recipe;
    }
}
