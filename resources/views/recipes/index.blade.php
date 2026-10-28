<x-layout>
    <style>
        .recipes {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            padding: 20px 0;
        }

        .recipe-card {
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px;
        }

        .recipe-card h2 {
            margin-top: 0;
        }
    </style>

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
