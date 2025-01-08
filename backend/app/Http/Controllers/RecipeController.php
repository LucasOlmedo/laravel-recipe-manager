<?php

namespace App\Http\Controllers;

use App\Application\Services\RecipeService;
use App\Http\Requests\CreateRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Http\Resources\RecipeResource;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function __construct(private RecipeService $recipeService) {}

    public function index(Request $request)
    {
        $recipes = $this->recipeService->searchRecipes($request->all());
        return RecipeResource::collection($recipes);
    }

    public function show(int $id)
    {
        $recipe = $this->recipeService->findRecipe($id);
        return new RecipeResource($recipe);
    }

    public function store(CreateRecipeRequest $request)
    {
        $recipe = $this->recipeService->createRecipe($request->validated());
        return new RecipeResource($recipe);
    }

    public function update(int $id, UpdateRecipeRequest $request) {
        $recipe = $this->recipeService->updateRecipe($id, $request->validated());
        return new RecipeResource($recipe);
    }

    public function destroy(int $id)
    {
        $this->recipeService->deleteRecipe($id);
        return response()->json([
            'message' => 'Recipe deleted successfully',
        ]);
    }
}
