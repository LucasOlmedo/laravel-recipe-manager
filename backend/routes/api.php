<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('recipes', App\Http\Controllers\RecipeController::class);
