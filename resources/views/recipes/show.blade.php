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

    <div class="comments-section">
        <h2>Comments</h2>

        <p class="comments-description">Share your thoughts about this recipe!</p>

        @auth
            <div class="comment-form">
                <h3>Leave a comment</h3>
                <form action="{{ route('comments.store', $recipe) }}"
                      method="POST">
                    @csrf
                    <textarea
                        name="content"
                        placeholder="Write your comment here..."
                        required
                    >{{ old('content') }}</textarea>

                    @error('content')
                    <p class="comment-error">{{ $message }}</p>
                    @enderror

                    <button type="submit">Post comment</button>
                </form>
            </div>
        @else
            <p class="no-comments">
                Please log in to leave a comment.
            </p>
        @endauth

        <div class="comments-list">
            @forelse($recipe->comments as $comment)
                <div class="comment-card">
                    <div class="comment-header">
                        <div class="comment-avatar">
                            {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="comment-user">
                                {{ $comment->user->name }}
                            </p>

                            <p class="comment-date">
                                {{ $comment->created_at->format('d-m-Y H:i') }}
                            </p>
                        </div>
                    </div>
                    <p class="comment-content">{{ $comment->content }}</p>
                </div>
            @empty
                <div class="no-comments">
                    No comments yet. Be the first to comment!
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
