<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.min.js"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen my-container">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>

            @yield('contents')

        </main>
    </div>
</body>

</html>

<style>
    .my-container {
        height: 100%;
        background: linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, #01BDD0 100%);

        /* background-image: url('https://us.123rf.com/450wm/wstockstudio/wstockstudio1707/wstockstudio170700042/81669810-stetoscopio-isolato-su-sfondo-nero-scrivania-di-medici-sterili-accessori-medici-sullo-sfondo-nero.jpg'); */
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    .my-btn {
        background-color: #01bdcc;
        color: white;
        border: 2px solid white;
        border-radius: .5rem;
        width: 100%;
    }

    .my-btn:hover {
        color: #01bdcc;
        background-color: white;
        border: 2px solid #01bdcc;

    }

    .my-second-btn {
        color: #01bdcc;
        background-color: white;
        border: 2px solid #01bdcc;
        border-radius: .5rem;
        margin-right: .5rem;

    }

    .my-second-btn:hover {
        color: white;
        background-color: #01bdcc;
    }
</style>
