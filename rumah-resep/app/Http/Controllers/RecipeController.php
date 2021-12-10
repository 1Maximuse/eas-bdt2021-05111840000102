<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::query()->options([
            'collation' => [
                'locale' => 'en'
            ]
        ])->orderBy('title')->paginate(10);

        return response()->view('recipes.index', [
            'recipes' => $recipes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('recipes.edit', [
            'mode' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $recipe = Recipe::create([
            'title' => $request->title,
            'categories' => array_map(function ($tag) { return trim($tag); }, explode(",", $request->tags)),
            'rating' => $request->rating,
            'calories' => $request->calories,
            'protein' => $request->protein,
            'fat' => $request->fat,
            'sodium' => $request->sodium,
            'desc' => $request->description,
            'ingredients' => array_map(function ($ingredient) { return trim($ingredient); }, explode("\n", $request->ingredients)),
            'directions' => array_map(function ($step) { return trim($step); }, explode("\n", $request->directions)),
        ]);

        $recipe->save();

        return redirect()->route('recipes.show', [
            'id' => $recipe->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::query()->findOrFail($id);

        return response()->view('recipes.show', [
            'recipe' => $recipe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::query()->findOrFail($id);

        return response()->view('recipes.edit', [
            'mode' => 'edit',
            'recipe' => $recipe
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::query()->findOrFail($id);

        $recipe->title = $request->title;
        $recipe->categories = array_map(function ($tag) { return trim($tag); }, explode(",", $request->tags));
        $recipe->rating = $request->rating;
        $recipe->calories = $request->calories;
        $recipe->protein = $request->protein;
        $recipe->fat = $request->fat;
        $recipe->sodium = $request->sodium;
        $recipe->desc = $request->description;
        $recipe->ingredients = array_map(function ($ingredient) { return trim($ingredient); }, explode("\n", $request->ingredients));
        $recipe->directions = array_map(function ($step) { return trim($step); }, explode("\n", $request->directions));

        $recipe->save();

        return redirect()->route('recipes.show', [
            'id' => $recipe->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $recipe = Recipe::query()->findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipes.index');
    }
}
