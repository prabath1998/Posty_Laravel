<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Posty</title>
</head>

<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li class="p-3">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="p-3">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="p-3">
                <a href="{{ route('posts') }}">Post</a>
            </li>
        </ul>

        <ul class="flex items-center">
            @auth
            <li class="p-3">
                <a href="" class="font-bold uppercase">Welcome <span class="text-green-400">{{auth()->user()->username}}</span></a>
            </li>
            <li class="p-3">
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button  type="submit">
                        Logout
                    </button>
                </form>
            </li>
            @endauth


            @guest
            <li class="p-3">
                <a href="{{ route('login') }}">Login</a>
            </li>
            <li class="p-3">
                <a href="{{ route('register') }}">Register</a>
            </li>
            @endguest


        </ul>
    </nav>
    @yield('content')
</body>

</html>
