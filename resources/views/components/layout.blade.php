@props([
    'title' => 'DidiRecipes'
])

    <!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title> {{ $title }} </title>

    <style>
        .max-w-400 {
            max-width: 400px;
            margin: auto;
        }

        .recipecard {
            background: #e3e3e3;
            padding: 1rem;
            text-align: center;
        }
    </style>

</head>
<body>
<nav>
    <a href="/home">Home</a>
    <a href="/recipes">Recipes</a>
    <a href="/recipes/create">Create Recipe</a>
</nav>

<main>
    {{ $slot }}
</main>
</body>
</html>
