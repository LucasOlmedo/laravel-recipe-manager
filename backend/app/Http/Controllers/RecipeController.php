<?php

namespace App\Http\Controllers;

use App\Application\Services\RecipeService;
use App\Http\Requests\CreateRecipeRequest;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function __construct(private RecipeService $recipeService) {}

    public function index(Request $request)
    {
        return $this->recipeService->searchRecipes($request->all());
    }

    public function show(int $id)
    {
        $recipe = $this->recipeService->findRecipe($id);
        return response()->json($recipe);
    }

    public function store(CreateRecipeRequest $request)
    {
        $recipe = $this->recipeService->createRecipe($request->validated());
        return response()->json($recipe, 201);
    }

    public function update() {}

    public function destroy() {}
}
