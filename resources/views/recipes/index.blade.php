<x-layout>
<h1>Recipes</h1>

<div class="recipes">
    @foreach ($recipes as $recipe)
        <article class="recipe-card">
            <h2>{{ $recipe->title }}</h2>

            <img src="{{ $recipe->image_url }}">

            <p>Preparation time: {{ $recipe->prep_time }} minutes</p>

            <a href="{{ route('recipes.show', $recipe) }}" class="button">More details</a>
        </article>
    @endforeach
</div>
</x-layout>
