<x-layout title="Recipes">
    <h1>Recipes</h1>
    <td>
        @foreach ($recipes as $recipe)
{{--            <tr>{{$recipe->user_id}}</tr>--}}
{{--            <tr>{{$recipe->category_id}}</tr>--}}
            <tr>{{$recipe->title}}</tr>
            <tr>{{$recipe->ingredients}}</tr>
            <tr>{{$recipe->instructions}}</tr>
            <tr>{{$recipe->prep_time}} minuten</tr>
{{--            <tr>{{$recipe->image_url}}</tr>--}}
            <br>
            <br>
        @endforeach
    </td>
</x-layout>
