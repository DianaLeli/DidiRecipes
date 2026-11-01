<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RecipeController extends Controller
{
    /**
     * Show the Recipes from DB on Recipes page
     */
    public function index(Request $request)
    {
        $recipes = Recipe::where('is_active', true)
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
            'recipes' => $recipes,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    /**
     * Show form to create a new Recipe
     */
    public function create()
    {
        $commentCount = Comment::where('user_id', auth()->id())->count();

        if ($commentCount < 5) {
            return view('recipes.create', [
                'commentCount' => $commentCount,
                'categories' => collect(),
            ]);
        }

        $categories = Category::all();

        return view('recipes.create', compact('categories', 'commentCount'));
    }

    /**
     * Store newly created Recipe in DB
     */
    public function store(Request $request)
    {
        $commentCount = Comment::where('user_id', auth()->id())->count();

        if ($commentCount < 5) {
            return redirect()->route('recipes.create')->with('error',
                'You must post at least 5 comments before creating a recipe.'
            );
        }

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
        if (!$recipe->is_active) {
            abort(404);
        }

        return view('recipes.show', ['recipe' => $recipe]);
    }

    /**
     * Delete a Recipe
     */
    public function destroy(Recipe $recipe)
    {
        Gate::authorize('delete-recipe', $recipe);

        $recipe->delete();

        // redirect naar recipes.index
        return redirect()->route('recipes.index')->with('success', 'Deleted Recipe Successfully');
    }

    /**
     * Edit a Recipe
     */
    public function edit(Recipe $recipe)
    {
        Gate::authorize('update-recipe', $recipe);

        $categories = Category::all();

        return view('recipes.edit', compact('recipe', 'categories'));
    }

    /**
     * Update a Recipe
     */
    public function update(Recipe $recipe)
    {
        Gate::authorize('update-recipe', $recipe);

        $recipe->update([
            'category_id' => request('category_id'),
            'title' => request('title'),
            'ingredients' => request('ingredients'),
            'instructions' => request('instructions'),
            'prep_time' => request('prep_time'),
            'image_url' => request('image_url'),
        ]);

        return redirect()->route('recipes.show', $recipe);
    }

    public function toggleStatus(Recipe $recipe)
    {
        $recipe->is_active = !$recipe->is_active;
        $recipe->save();

        return redirect()->back()->with('success', 'Recipe status updated!');
    }
}
