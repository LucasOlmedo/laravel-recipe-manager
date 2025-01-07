<?php

namespace App\Infrastructure\Repositories;

use App\Models\Recipe as RecipeModel;
use App\Domain\Entities\Recipe as RecipeEntity;
use App\Domain\Repositories\RecipeRepositoryInterface;
use App\Infrastructure\Mappers\RecipeMapper;

class RecipeRepository implements RecipeRepositoryInterface
{
    private RecipeMapper $recipeMapper;

    public function __construct(RecipeMapper $recipeMapper)
    {
        $this->recipeMapper = $recipeMapper;
    }

    public function search(array $filters = []): array
    {
        return [];
    }

    public function find(string $id): ?RecipeEntity
    {
        return null;
    }

    public function save(RecipeEntity $recipe): RecipeEntity
    {
        return $recipe;
    }

    public function update(RecipeEntity $recipe): RecipeEntity
    {
        return $recipe;
    }

    public function delete(string $id): void
    {
        RecipeModel::destroy($id);
    }
}
