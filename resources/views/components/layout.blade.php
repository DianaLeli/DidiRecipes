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
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            padding: 20px 0;
        }

        .recipe-card {
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px;
        }

        .recipe-card h2 {
            margin-top: 0;
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
