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


        /* Comments section */
        .comments-section {
            margin-top: 3rem;
        }

        .comments-section h2 {
            font-size: 1.6rem;
            color: #292524;
            margin-bottom: 0.5rem;
        }

        .comments-description {
            color: #78716c;
            margin-bottom: 1.5rem;
        }

        /* Comment form */
        .comment-form {
            background: white;
            border: 1px solid #d6d3d1;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .comment-form h3 {
            margin-top: 0;
            color: #292524;
        }

        .comment-form textarea {
            width: 100%;
            min-height: 100px;
            resize: vertical;
            background: #fafaf9;
        }

        .comment-form textarea:focus {
            outline: none;
            border-color: #9a3412;
            box-shadow: 0 0 0 2px rgb(154 52 18 / 12%);
        }

        .comment-form button {
            margin-top: 0.75rem;
            padding: 0.6rem 1.2rem;
        }

        /* Individual comments */
        .comments-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .comment-card {
            background: white;
            border: 1px solid #e7e5e4;
            border-radius: 12px;
            padding: 1.25rem;
            transition: box-shadow 0.2s ease;
        }

        .comment-card:hover {
            box-shadow: 0 3px 10px rgb(41 37 36 / 8%);
        }

        .comment-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 0.75rem;
        }

        .comment-avatar {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #ffedd5;
            color: #9a3412;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .comment-user {
            font-weight: 600;
            color: #292524;
            margin: 0;
        }

        .comment-date {
            font-size: 0.8rem;
            color: #a8a29e;
            margin: 0;
        }

        .comment-content {
            color: #57534e;
            margin: 0;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        /* Empty comments */
        .no-comments {
            text-align: center;
            padding: 2rem;
            background: #f5f5f4;
            border: 1px dashed #d6d3d1;
            border-radius: 12px;
            color: #78716c;
        }

        /* Error messages */
        .comment-error {
            color: #b91c1c;
            font-size: 0.9rem;
            margin-top: 0.5rem;
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
