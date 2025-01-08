<?php

namespace App\Infrastructure\Repositories;

use App\Models\Recipe as RecipeModel;
use App\Domain\Entities\Recipe as RecipeEntity;
use App\Domain\Exceptions\Recipe\RecipeNotFoundException;
use App\Domain\Repositories\RecipeRepositoryInterface;
use App\Infrastructure\Mappers\RecipeMapper;
use Exception;

class RecipeRepository implements RecipeRepositoryInterface
{
    public function __construct(private RecipeMapper $recipeMapper) {}

    public function search(array $filters = []): array
    {
        // filters not implemented
        return RecipeModel::all()
            ->map(fn(RecipeModel $model) => $this->recipeMapper->toEntity($model))
            ->toArray();
    }

    public function find(int $id): ?RecipeEntity
    {
        try {
            $model = RecipeModel::findOrFail($id);
            return $this->recipeMapper->toEntity($model);
        } catch (Exception $e) {
            throw new RecipeNotFoundException();
        }
    }

    public function save(RecipeEntity $recipe): RecipeEntity
    {
        $model = $this->recipeMapper->toModel($recipe);
        $model->save();
        return $this->recipeMapper->toEntity($model);
    }

    public function update(RecipeEntity $recipe): RecipeEntity
    {
        $model = $this->recipeMapper->toModel($recipe);
        $model->update();
        return $this->recipeMapper->toEntity($model);
    }

    public function delete(RecipeEntity $recipe): void
    {
        RecipeModel::destroy($recipe->id);
    }
}
