<div>
    <form action="{{ route('recipes.destroy', $recipe) }}" method="post">
        @method('DELETE')
        <button type="submit">DELETE</button>
    </form>
</div>
