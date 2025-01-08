<?php

namespace App\Application\Services;

use App\Application\UseCases\Recipes\CreateRecipeUseCase;
use App\Application\UseCases\Recipes\DeleteRecipeUseCase;
use App\Application\UseCases\Recipes\FindRecipeUseCase;
use App\Application\UseCases\Recipes\GetAllRecipesUseCase;
use App\Application\UseCases\Recipes\UpdateRecipeUseCase;
use App\Domain\Entities\Recipe;

class RecipeService
{
    public function __construct(
        private CreateRecipeUseCase $createRecipeUseCase,
        private GetAllRecipesUseCase $getAllRecipesUseCase,
        private FindRecipeUseCase $findRecipeUseCase,
        private UpdateRecipeUseCase $updateRecipeUseCase,
        private DeleteRecipeUseCase $deleteRecipeUseCase
    ) {}

    public function searchRecipes(array $filters): array
    {
        return $this->getAllRecipesUseCase->execute($filters);
    }

    public function findRecipe(int $id): ?Recipe
    {
        return $this->findRecipeUseCase->execute($id);
    }

    public function createRecipe(array $data)
    {
        return $this->createRecipeUseCase->execute($data);
    }

    public function updateRecipe(int $id, array $data)
    {
        $recipe = $this->findRecipeUseCase->execute($id);
        return $this->updateRecipeUseCase->execute($recipe, $data);
    }

    public function deleteRecipe(int $id)
    {
        $recipe = $this->findRecipeUseCase->execute($id);
        $this->deleteRecipeUseCase->execute($recipe);
    }
}
