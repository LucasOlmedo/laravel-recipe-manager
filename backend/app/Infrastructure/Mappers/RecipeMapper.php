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
            json_decode($model->steps),
            json_decode($model->ingredients),
            json_decode($model?->tags),
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
        $model->user_id = $entity->user_id;
        $model->title = $entity->title;
        $model->description = $entity?->description;
        $model->preparation_time = $entity?->preparationTime;
        $model->steps = json_encode($entity->steps);
        $model->ingredients = json_encode($entity->ingredients);
        $model->tags = json_encode($entity?->tags);
        $model->image_url = $entity?->imageUrl;
        $model->integration = $entity?->integration;
        $model->integration_ref_id = $entity?->integrationRefId;

        return $model;
    }
}
