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
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #d6d3d1;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-left: auto;
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

        form input,
        form textarea,
        form select {
            width: 100%;
            display: block;
        }

        .remember-me label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            padding-top: 10px;
        }

        .remember-me input {
            width: auto;
            margin: 0;
        }

        .login-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        button {
            color: white;
            background: #9a3412;
            border-color: #9a3412;
            cursor: pointer;
            margin-top: 1rem;
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

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
            background: white;
            border: 1px solid #d6d3d1;
            border-radius: 8px;
            overflow: hidden;
        }

        .admin-table th,
        .admin-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #e7e5e4;
        }

        .admin-table th {
            background: #f5f5f4;
            color: #57534e;
            font-weight: 600;
        }

        .admin-table tr:last-child td {
            border-bottom: none;
        }

        .admin-table tr:hover {
            background: #fafaf9;
        }

        .status {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .active {
            background: #dcfce7;
            color: #166534;
        }

        .inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        .admin-table button {
            margin: 0;
            padding: 6px 12px;
            font-size: 0.85rem;
        }

        .admin-table .activate {
            background: #166534;
            border-color: #166534;
        }

        .admin-table .activate:hover {
            background: #14532d;
        }

        .admin-table .deactivate {
            background: #9a3412;
            border-color: #9a3412;
        }

        .admin-table .deactivate:hover {
            background: #7c2d12;
        }

        .admin-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .admin-actions form {
            margin: 0;
        }

        .admin-actions button {
            margin: 0;
        }

        .edit-button {
            display: inline-block;
            padding: 6px 12px;
            background: #57534e;
            color: white;
            text-decoration: none;
            border-radius: 0.35rem;
            font-size: 0.85rem;
        }

        .edit-button:hover {
            background: #44403c;
            color: white;
        }
    </style>

</head>
<body>
<nav>
    <div class="nav-left">
        <a href="/home">Home</a>
        <a href="/recipes">Recipes</a>
    </div>

    <div class="nav-right">
        @guest
            <a href="/register">Register</a>
            <a href="/login">Login</a>
        @endguest

        @auth
            <span>
                Hi there, {{ Auth::user()->name }}
            </span>

            @can('view-admin')
            <a href="/admin">Admin</a>
            @endcan

            <a href="/recipes/create">Create Recipe</a>
            <a href="/profile">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</a>
            </form>
        @endauth
    </div>
</nav>

<main>
    {{ $slot }}
</main>
</body>
</html>
