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
        <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
        <!--Tailwind cdn-->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Font Awesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        @livewireStyles
        <!-- Alpine.js CDN -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        <!-- Lodash 라이브러리 추가 (버전은 필요에 따라 변경) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
        <!-- GSAP 라이브러리 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
        <!-- GSAP ScrollToPlugin -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollToPlugin.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>@yield('title') - xyz Mart</title>
        <style>
            body {
                font-family: "JetBrains Mono", "Kiwi Maru", sans-serif;
            }
            h1, h2, h3, h4, h5 {
                font-family: "JetBrains Mono", "Kiwi Maru", sans-serif;
            }

            #to-top {
                width: 42px;
                height: 42px;
                background-color: #333;
                color: #fff;
                border: 2px solid #fff;
                border-radius: 10px;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
                position: fixed;
                bottom: 30px;
                right: 30px;
                z-index: 9;
            }

            .material-icons {
                height: 24px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -60%);
                margin: auto;
                transition: 0.4s;
                opacity: 1;
                color: #fff;
                font-size: 30px;
            }
        </style>
    </head>
    <body>
        @livewireScripts
        @include('layouts.shop_header')
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
