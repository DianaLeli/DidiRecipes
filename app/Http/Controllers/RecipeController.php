<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Show the Recipes from DB on Recipes page
     */
    public function index()
    {
        $recipes = Recipe::all();

        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show form to create a new Recipe
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store newly created Recipe in DB
     */
    public function store(Request $request)
    {
        // validatie op de data
        $request->validate([
            'title' => 'required|min:3',
            'ingredients' => 'required',
            'instructions' => 'required',
            'prep_time' => 'required',
            'image_url' => 'required'
        ]);

        // info in database zetten
        $recipe = new Recipe();
        $recipe->user_id = 1;
        $recipe->category_id = 1;
        $recipe->title = $request->input('title');
        $recipe->ingredients = $request->input('ingredients');
        $recipe->instructions = $request->input('instructions');
        $recipe->prep_time = $request->input('prep_time');
        $recipe->image_url = $request->input('image_url');

        $recipe->save();

        // redirect naar recipes.index
        return redirect()->route('recipes.index');
    }

    /**
     * Show Recipe Details
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show', ['recipe' => $recipe]);
    }

    /**
     * Delete a Recipe
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        // redirect naar recipes.index
        return redirect()->route('recipes.index')->with('success', 'Deleted Recipe Successfully');}
}
