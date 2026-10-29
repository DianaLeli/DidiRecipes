<x-layout>
    <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}">

    <h1>{{ $recipe->title }}</h1>
    <p>Preparation time: {{ $recipe->prep_time }} minutes</p>

    <h2>Ingredients</h2>
    <p>{{ $recipe->ingredients }}</p>

    <h2>Instructions</h2>
    <p>{{ $recipe->instructions }}</p>

    <form action="{{ route('recipes.destroy', $recipe) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this recipe?');">
        @method('DELETE')
        <button type="submit">DELETE</button>
    </form>
</x-layout>
