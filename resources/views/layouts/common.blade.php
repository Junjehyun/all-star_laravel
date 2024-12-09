<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&display=swap" rel="stylesheet">
        <!--Tailwind cdn-->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Font Awesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <!-- Alpine.js CDN -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        @livewireScripts
        <title>@yield('title') - Untitle</title>
        <style>
            body {
                font-family: 'Kiwi Maru', sans-serif;
            }
            h1, h2, h3, h4, h5 {
                font-family: 'Kiwi Maru', sans-serif;
            }
        </style>
    </head>
    <body>
        @include('layouts.header')
        @if(session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded-lg shadow-md mb-6">
                {{ session('success') }}
            </div>
            @endif
            @if ($errors->any())
            <div id="error-message" class="bg-red-500 text-white p-4 rounded-lg shadow-md mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex-grow p-3">
                @yield('content')
        </div>
    </body>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#success-message').fadeOut('slow');
                $('#error-message').fadeOut('slow');
            }, 3000);
        });
    </script>
</html>
