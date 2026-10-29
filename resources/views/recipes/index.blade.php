<x-layout>
    <h1>Recipes</h1>

    <form action="{{ route('recipes.index') }}" method="GET">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search...">

        <select name="category">
            <option value="">All categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @selected(request('category') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Filter</button>
        <a href="{{ route('recipes.index') }}">Reset</a>
    </form>

    <div class="recipes">
        @foreach ($recipes as $recipe)
            <article class="recipe-card">
                <h2>{{ $recipe->title }}</h2>

                <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}">

                <p>Preparation time: {{ $recipe->prep_time }} minutes</p>

                <a href="{{ route('recipes.show', $recipe) }}" class="button">More details</a>
            </article>
        @endforeach
    </div>
</x-layout>
