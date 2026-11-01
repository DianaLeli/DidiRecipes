<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Recipe $recipe)
    {
        $validated = $request->validate([
            'content' => 'required|string|min:2|max:1000',
        ]);

        $recipe->comments()->create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        return redirect()->route('recipes.show', $recipe)
            ->with('success', 'Comment successfully added!');
    }
}
