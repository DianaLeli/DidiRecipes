<x-layout title="{{ $recipe->title }}">
    <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}">

    <h1>{{ $recipe->title }}</h1>
    <p>
        Preparation time: {{ $recipe->prep_time }} minutes.
        <br>
        Category: {{ $recipe->category->name }}
    </p>

    <h2>Ingredients</h2>
    <p>{{ $recipe->ingredients }}</p>

    <h2>Instructions</h2>
    <p>{{ $recipe->instructions }}</p>

        @can('delete-recipe', $recipe)
            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Recipe</button>
            </form>
        @endcan

        @can('update-recipe', $recipe)
            <form action="{{ route('recipes.edit', $recipe->id) }}" method="GET">
                @csrf
                <button type="submit">Edit Recipe</button>
            </form>
        @endcan
</x-layout>
