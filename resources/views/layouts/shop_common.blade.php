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
        <!-- Chart.js CDN 추가 -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <body class="flex flex-col min-h-screen">
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
        <div class="flex-grow transition-opacity duration-700 opacity-0 page-transition">
                @yield('content')
        </div>
        <footer class="bg-gray-500 text-white py-6 mt-10">
            <div class="container mx-auto text-center">
                <p class="text-sm">&copy; 2025 xyz Mart. All rights reserved.</p>
                <div class="mt-4">
                    <a href="#" class="text-gray-300 hover:text-white mx-4">Privacy Policy</a>
                    <a href="#" class="text-gray-300 hover:text-white mx-4">Terms of Service</a>
                    <a href="#" class="text-gray-300 hover:text-white mx-4">Contact Us</a>
                    <a href="/notice_index" class="text-gray-300 hover:text-white mx-4">Q&A</a>
                </div>
                <div class="mt-6">
                    <p class="text-sm">Follow us</p>
                    <div class="flex justify-center space-x-6 mt-2">
                        <a href="#" class="text-gray-300 hover:text-white text-xl">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white text-xl">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white text-xl">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white text-xl">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#success-message').fadeOut('slow');
                $('#error-message').fadeOut('slow');
            }, 3000);
        });

        document.addEventListener('DOMContentLoaded', function() {
            // 페이지가 로드된 후 페이드 인 효과를 추가
            document.querySelector('.page-transition').classList.remove('opacity-0');
            document.querySelector('.page-transition').classList.add('opacity-100');
        });

        // 오른쪽 마우스 클릭 금지 (관리자 제외)
        const userRole = @json(Auth::user()->role); // Admin 또는 다른 역할을 확인

        // 만약 role이 Admin이면 오른쪽 클릭 허용
        if (userRole !== 'admin') {
            // 일반 user라면 오른쪽 마우스 버튼 클릭 방지
            document.addEventListener('contextmenu', function (e) {
                e.preventDefault(); // 기본 컨텍스트 메뉴 차단
                alert("Right click is desabled for non-admin users!");
            });
        }
    </script>
</html>
