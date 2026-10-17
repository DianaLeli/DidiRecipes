<x-layout>
    <h1>Create new Recipe</h1>
    <form action="{{ route('recipes.store')  }}" method="post">
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}"/>
            @error('title')
            <span class="text-red-500"> {{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="ingredients">Ingredients</label>
            <input type="text" id="ingredients" name="ingredients" value="{{ old('ingredients') }}"/>
            @error('ingredients')
            <span class="text-red-500"> {{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="instructions">Instructions</label>
            <input type="text" id="instructions" name="instructions" value="{{ old('instructions') }}"/>
            @error('instructions')
            <span class="text-red-500"> {{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="prep_time">Prep Time</label>
            <input type="text" id="prep_time" name="prep_time" value="{{ old('prep_time') }}"/>
            @error('prep_time')
            <span class="text-red-500"> {{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="image_url">Image URL</label>
            <input type="text" id="image_url" name="image_url" value="{{ old('image_url') }}"/>
            @error('image_url')
            <span class="text-red-500"> {{ $message }}</span>
            @enderror
        </div>

        <button type="submit" name="submit">Save</button>
    </form>
</x-layout>
