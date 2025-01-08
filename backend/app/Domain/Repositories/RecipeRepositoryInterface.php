<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Recipe;

interface RecipeRepositoryInterface
{
    public function search(array $filters = []): array;
    public function find(int $id): ?Recipe;
    public function save(Recipe $entity): Recipe;
    public function update(Recipe $entity): Recipe;
    public function delete(Recipe $entity): void;
}
