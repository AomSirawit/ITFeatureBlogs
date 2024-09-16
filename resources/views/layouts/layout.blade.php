<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets\logo2.png')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @vite('resources/css/app.css')
    <title>@yield('title', ' Home ')</title>

</head>


<body style="font-family: Prompt, sans-serif;" class="min-h-screen flex flex-col">
    <div class="navbar font-semibold bg-white shadow-lg sticky top-0" style="z-index: 1">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li><a href={{ url('/') }}>Home</a></li>
                    <li>
                        <a href="#">Category</a>
                        <ul class="p-2">
                            <li><a href="{{ url('/website') }}">Website</a></li>
                            <li><a href="{{ url('/mobile') }}">Mobile</a></li>
                            <li><a href="{{ url('/technology') }}">Technology</a></li>
                            <li><a href="{{ url('/study') }}">Study</a></li>
                            <li><a href="{{ url('/career') }}">Career</a></li>
                            <li><a href="{{ url('/other') }}">Other</a></li>
                        </ul>
                    </li>
                    <li><a href={{ url('/search') }}>Search</a></li>
                </ul>
            </div>
            <h1 class="text-2xl font-bold mx-5 text-blue-500">IT<span class="text-yellow-500">Feature</span> </h1>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href={{ url('/') }}>Home</a></li>
                <li>
                    <details>
                        <summary>Category</summary>
                        <ul class="p-2">
                            <li><a href="{{ url('/website') }}">Website</a></li>
                            <li><a href="{{ url('/mobile') }}">Mobile</a></li>
                            <li><a href="{{ url('/technology') }}">Technology</a></li>
                            <li><a href="{{ url('/study') }}">Study</a></li>
                            <li><a href="{{ url('/career') }}">Career</a></li>
                            <li><a href="{{ url('/other') }}">Other</a></li>
                        </ul>
                    </details>
                </li>
                <li><a href={{ url('/search') }}>Search</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            <a href="https://linktr.ee/ITFeature" class="btn btn-primary text-white" target="_blank">Contact</a>
        </div>
    </div>
    <div class="flex-grow">
        @yield('content')
    </div>

    <footer class="footer flex justify-center bg-neutral text-neutral-content items-center p-4 mt-10">
        <aside class="grid-flow-col items-center">
           <img src={{ asset('assets/logo2.png') }} alt="" class="w-10">
            <p>ITFeaute Copyright © 2024 - All right reserved</p>
        </aside>
       
    </footer>
</body>

</html>
