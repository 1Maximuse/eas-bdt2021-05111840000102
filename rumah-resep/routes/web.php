<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [RecipeController::class, 'index'])->name('recipes.index');
    Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');
    Route::get('/recipe/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipe/create', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/recipe/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::post('/recipe/{id}/edit', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipe/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
});

require __DIR__.'/auth.php';
