<x-layout title="Admin">
    <h1>Admin Dashboard</h1>
    <h2>Manage Recipes</h2>

    <table class="admin-table">
        <thead>
        <tr>
            <th>Recipe</th>
            <th>Owner</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($recipes as $recipe)
            <tr>
                <td>{{ $recipe->title }}</td>
                <td>{{ $recipe->user->name ?? 'Unknown' }}</td>
                <td>
                    @if($recipe->is_active)
                        <span class="status active">Active</span>
                    @else
                        <span class="status inactive">Inactive</span>
                    @endif
                </td>
                <td class="admin-actions">
                    <a href="{{ route('recipes.edit', $recipe) }}" class="edit-button">Edit</a>

                    <form action="{{ route('admin.recipes.toggle-status', $recipe) }}" method="POST">
                        @csrf
                        <button type="submit" class="{{ $recipe->is_active ? 'deactivate' : 'activate' }}">
                            {{ $recipe->is_active ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-layout>
