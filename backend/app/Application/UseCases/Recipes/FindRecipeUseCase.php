<?php

namespace App\Application\UseCases\Recipes;

use App\Domain\Entities\Recipe;
use App\Domain\Repositories\RecipeRepositoryInterface;

class FindRecipeUseCase
{
    public function __construct(private RecipeRepositoryInterface $recipeRepository) {}

    public function execute(int $id): Recipe
    {
        return $this->recipeRepository->find(id: $id);
    }
}
