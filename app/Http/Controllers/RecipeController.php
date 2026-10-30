<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Show the Recipes from DB on Recipes page
     */
    public function index(Request $request)
    {
        $recipes = Recipe::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('title', 'like', '%' . $request->search . '%')
                        ->orWhere('content', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('recipes.index', [
            'recipes'   => $recipes,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    /**
     * Show form to create a new Recipe
     */
    public function create()
    {
        $categories = Category::all();

        return view('recipes.create', compact('categories'));
    }

    /**
     * Store newly created Recipe in DB
     */
    public function store(Request $request)
    {
        // validatie op de data
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|min:3',
            'ingredients' => 'required',
            'instructions' => 'required',
            'prep_time' => 'required',
            'image_url' => 'required'
        ]);

        // info in database zetten
        $recipe = new Recipe();
        $recipe->user_id = auth()->id();
        $recipe->category_id = $request->input('category_id');
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
