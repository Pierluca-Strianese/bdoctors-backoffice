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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
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
    <style>.title {
        /* margin-top: 6rem; */
        margin-left: 4rem;
    }

    h1 {
        color: rgb(0, 109, 177);
        font-size: 5rem
    }




    .my-container {
        background: linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, #01BDD0 100%);

        /* background-image: url('https://us.123rf.com/450wm/wstockstudio/wstockstudio1707/wstockstudio170700042/81669810-stetoscopio-isolato-su-sfondo-nero-scrivania-di-medici-sterili-accessori-medici-sullo-sfondo-nero.jpg'); */
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
    }
</style>
