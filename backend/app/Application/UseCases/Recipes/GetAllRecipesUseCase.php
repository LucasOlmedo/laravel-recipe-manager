<?php

namespace App\Application\UseCases\Recipes;

use App\Domain\Repositories\RecipeRepositoryInterface;

class GetAllRecipesUseCase
{
    public function __construct(private RecipeRepositoryInterface $recipeRepository) {}

    public function execute(array $filters): array
    {
        return $this->recipeRepository->search(filters: $filters);
    }
}
