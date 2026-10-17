<x-layout title="Recipes">
    <h1>Recipes</h1>
    <ul>
        @foreach ($recipes as $recipe)
{{--            <li>{{$recipe->user_id}}</li>--}}
{{--            <li>{{$recipe->category_id}}</li>--}}
            <li>{{$recipe->title}}</li>
            <li>{{$recipe->ingredients}}</li>
            <li>{{$recipe->instructions}}</li>
            <li>{{$recipe->prep_time}} minuten</li>
{{--            <li>{{$recipe->image_url}}</li>--}}
        @endforeach
    </ul>
</x-layout>
