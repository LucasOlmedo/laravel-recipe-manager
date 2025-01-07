<?php

namespace App\Infrastructure\Mappers;

use App\Models\Recipe as RecipeModel;
use App\Domain\Entities\Recipe as RecipeEntity;
use App\Domain\Mappers\EntityMapperInterface;

class RecipeMapper implements EntityMapperInterface
{
    public function toEntity(object $model): RecipeEntity
    {
        if (!$model instanceof RecipeModel)
            throw new \InvalidArgumentException('O objeto deve ser uma instância de RecipeModel');

        return new RecipeEntity(
            $model->id,
            $model->user_id,
            $model->title,
            $model?->description,
            $model?->preparation_time,
            $model->steps,
            $model->ingredients,
            $model?->tags,
            $model?->image_url,
            $model?->integration,
            $model?->integration_ref_id
        );
    }

    public function toModel(object $entity): RecipeModel
    {
        if (!$entity instanceof RecipeEntity)
            throw new \InvalidArgumentException('O objeto deve ser uma instância de Recipe');

        $model = RecipeModel::findOrNew($entity->id);
        $model->id = $entity->id;
        $model->title = $entity->title;
        $model->description = $entity?->description;
        $model->preparation_time = $entity?->preparationTime;
        $model->steps = $entity->steps;
        $model->ingredients = $entity->ingredients;
        $model->tags = $entity?->tags;
        $model->image_url = $entity?->imageUrl;
        $model->integration = $entity?->integration;
        $model->integration_ref_id = $entity?->integrationRefId;

        return $model;
    }
}
