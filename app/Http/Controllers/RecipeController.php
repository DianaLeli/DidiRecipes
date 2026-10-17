<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();

        return view('recipes.index', compact('recipes'));

//        $recipe = new Recipe();
//        $recipe->title = 'Soep';
//        $recipe->ingredients = '';
//        $recipe->instructions = '';
//        $recipe->prep_time = '20';
    }

    public function show()
    {

    }

    public function create()
    {
        return view('recipes.create');
    }

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
        $recipe->image_url = 'temp';

        $recipe->save();

        // redirect naar recipes.index
        return redirect()->route('recipes.index');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('recipes.destroy');
    }
}
