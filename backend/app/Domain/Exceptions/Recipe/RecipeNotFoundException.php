<?php

namespace App\Domain\Exceptions\Recipe;

use App\Domain\Exceptions\DomainException;

class RecipeNotFoundException extends DomainException
{
    public function __construct()
    {
        parent::__construct(message: 'Recipe not found', code: 404);
    }
}
