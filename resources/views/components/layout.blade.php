@props([
    'title' => 'DidiRecipes'
])

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title> {{ $title }} </title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            max-width: 960px;
            margin: 0 auto;
            padding: 2rem 1.25rem;
            color: #292524;
            background: #fafaf9;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            line-height: 1.6;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #d6d3d1;
        }

        a {
            color: #9a3412;
        }

        a:hover {
            color: #c2410c;
        }

        main {
            padding-top: 1.5rem;
        }

        h1,
        h2,
        h3 {
            line-height: 1.25;
        }

        input,
        textarea,
        select,
        button {
            max-width: 100%;
            padding: 0.55rem 0.75rem;
            border: 1px solid #a8a29e;
            border-radius: 0.35rem;
            font: inherit;
        }

        button {
            color: white;
            background: #9a3412;
            border-color: #9a3412;
            cursor: pointer;
        }

        button:hover {
            background: #7c2d12;
        }

        img {
            display: block;
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            box-shadow: 0 2px 8px rgb(41 37 36 / 12%);
        }

        .recipes {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            padding: 20px 0;
        }

        .recipe-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            min-height: 380px;
            overflow: hidden;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px;
            background: white;
        }

        .recipe-card img {
            width: 100%;
            height: 180px;
            aspect-ratio: 4 / 3;
            object-fit: cover;
            margin-bottom: 1rem;
        }

        .recipe-card h2 {
            margin: 0 0 0.5rem;
            font-size: 1.15rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .recipe-card p {
            margin: 0 0 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .recipe-card a:last-child {
            margin-top: auto;
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
