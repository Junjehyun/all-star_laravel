<header class="bg-transparent shadow-lg text-gray-600 p-3">
    <div class="container mx-auto flex justify-between items-center hover:text-gray-300 transition-colors duration-300 px-5 py-3">
        <a href="/main_index" class="text-xl font-bold">WEB_SERVICE_COLLECTION</a>
        <nav>
            <div class="flex justify-end space-x-4 mt-1">
                @auth
                    <form action="{{ route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="text-md">
                            サインアウト
                        </button>
                    </form>
                @else
                    <div class="flex flex-row items-center justify-center space-x-4 mt-2">
                        <form action="/login" method="GET">
                            <button type="submit" class="text-md">
                                サインイン
                            </button>
                        </form>
                        <form action="/register" method="GET">
                            <button type="submit" class="text-md">
                                新規登録
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </nav>
    </div>
</header>
