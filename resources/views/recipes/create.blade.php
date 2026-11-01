<x-layout title="Create Recipe">
    @if($commentCount < 5)

        <div class="alert alert-warning">
            <h2>You cannot create a recipe yet!</h2>
            <p>You must post at least 5 comments before you can create a recipe.</p>
            <p>You have posted {{ $commentCount }} out of 5 comments.</p>
        </div>
    @else

    <h1>Create new Recipe</h1>
    <form action="{{ route('recipes.store')  }}" method="post">
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}"/>
            @error('title')
            <span> {{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="ingredients">Ingredients</label>
            <input type="text" id="ingredients" name="ingredients" value="{{ old('ingredients') }}"/>
            @error('ingredients')
            <span> {{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="instructions">Instructions</label>
            <input type="text" id="instructions" name="instructions" value="{{ old('instructions') }}"/>
            @error('instructions')
            <span> {{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="prep_time">Prep Time</label>
            <input type="text" id="prep_time" name="prep_time" value="{{ old('prep_time') }}"/>
            @error('prep_time')
            <span> {{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="category_id">Category</label>

            <select name="category_id" id="category_id">
                <option value="">Choose a category</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
            <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="image_url">Image URL</label>
            <input type="text" id="image_url" name="image_url" value="{{ old('image_url') }}"/>
            @error('image_url')
            <span> {{ $message }}</span>
            @enderror
        </div>

        <button type="submit" name="submit">Save</button>
    </form>
    @endif
</x-layout>
