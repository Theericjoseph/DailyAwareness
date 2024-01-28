<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Awareness</title>

    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')

    {{-- Flowbite CSS --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="bg-gray-200">

    <nav class="bg-white flex flex-wrap items-center justify-between p-6 mb-6">

        <!-- Menu Icon and User Information for Mobile -->
        <div class="flex block lg:hidden justify-between items-center">
            <!-- Menu Icon for Mobile -->
            <button id="menu-toggle" class="flex items-center px-3 py-2 text-gray-600 hover:text-blue-500">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>

            <!-- User Information for Small Screens -->
            @auth
                <div class="ml-4">
                    <a href="{{ route('new.awareness', auth()->user()) }}"
                        class="p-3 hover:text-blue-500">{{ auth()->user()->name }}</a>
                </div>
            @endauth
        </div>

        <!-- Navigation Links for Large Screens -->
        <ul class="hidden lg:flex items-center">
            <li>
                <a href="{{ route('home') }}" class="p-6 hover:text-blue-500">DailyAwareness</a>
            </li>
            {{-- Nav bar elements for authenticated user --}}
            @auth
                <li>
                    <a href="{{ route('awareness') }}" class="p-6 hover:text-blue-500">Awareness+</a>
                </li>
                <li>
                    <a href="{{ route('user.history', auth()->user()) }}" class="p-6 hover:text-blue-500">History</a>
                </li>
            @endauth
        </ul>

        <!-- User and Auth Links for Large Screens -->
        <ul class="hidden lg:flex items-center">
            @auth
                <li>
                    <a href="{{ route('new.awareness', auth()->user()) }}"
                        class="p-6 hover:text-blue-500">{{ auth()->user()->name }}</a>
                </li>
                <form action="{{ route('logout') }}" method="post" class="inline">
                    @csrf
                    <button type="submit" class="p-3 hover:text-blue-500 ">Logout</button>
                </form>
            @endauth

            @guest
                <li>
                    <a href="{{ route('login') }}" class="p-6 hover:text-blue-500">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-6 hover:text-blue-500">Register</a>
                </li>
            @endguest

        </ul>

        <!-- Mobile Menu -->
        <div id="menu" class="lg:hidden w-full mt-4 hidden">
            <ul class="flex flex-col">
                {{-- Nav bar elements for authenticated user --}}
                @auth
                    <li class="mt-3">
                        <a href="{{ route('awareness') }}" class="p-3 hover:text-blue-500 ">Awareness+</a>
                    </li>
                    <li class="mt-3">
                        <a href="{{ route('user.history', auth()->user()) }}" class="p-3 hover:text-blue-500 ">History</a>
                    </li>
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit" class="p-3 hover:text-blue-500 ">Logout</button>
                    </form>

                @endauth

                {{-- Nav bar elements for guests --}}
                @guest
                    <li class="mt-3">
                        <a href="{{ route('login') }}" class="p-3 hover:text-blue-500 ">Login</a>
                    </li>
                    <li class="mt-3">
                        <a href="{{ route('register') }}" class="p-3 hover:text-blue-500 ">Register</a>
                    </li>
                @endguest
            </ul>
        </div>

    </nav>


    @yield('content')



    <script>
        // JavaScript to toggle mobile menu visibility
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('menu').classList.toggle('hidden');
        });
    </script>

    {{-- Flowbite JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>


</body>

</html>
