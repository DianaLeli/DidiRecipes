<x-layout>
<h1>Edit Recipe</h1>

<form method="POST" action="{{ route('recipes.update', $recipe) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <p>
        <label for="title">Title</label><br>
        <input id="title" name="title" value="{{ old('title', $recipe->title) }}">
        @error('title') <br><span style="color:#b91c1c">{{ $message }}</span> @enderror
    </p>

    <p>
        <label for="description">Description</label><br>
        <textarea id="description" name="description" rows="6">{{ old('description', $recipe->description) }}</textarea>
        @error('description') <br><span style="color:#b91c1c">{{ $message }}</span> @enderror
    </p>

    <p>
        <label for="category_id">Category</label><br>
        <select id="category_id" name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @selected(old('category_id', $recipe->category_id) == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <br><span style="color:#b91c1c">{{ $message }}</span> @enderror
    </p>

    <p>
        <label for="image">Image</label><br>
        @if ($recipe->image_url)
            <img src="{{ asset('storage/' . $recipe->image_url) }}" alt="" style="max-width:200px"><br>
        @endif
        <input id="image" name="image">
        <small>Leave blank to keep the current image.</small>
        @error('image') <br><span style="color:#b91c1c">{{ $message }}</span> @enderror
    </p>

    <button type="submit">Save</button>
    <a href="{{ route('recipes.show', $recipe) }}">Cancel</a>
</form>
</x-layout>
