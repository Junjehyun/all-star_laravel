<header class="bg-transparent shadow-xl text-gray-600 p-4">
    <div class="container mx-auto flex justify-between items-center">
        {{-- <a href="/main_index" class="text-xl font-bold">Programming Center</h1> --}}
        <div class="flex space-x-4 justify-end">
            <div class="flex flex-row items-center justify-center space-x-4 mt-2">
                @auth
                <form action="{{ route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="text-lg">
                        ログアウト
                    </button>
                </form>
            </div>
        </div>
        @else
        <div class="flex flex-row items-center justify-center space-x-4 mt-2">
            <form action="/login" method="GET">
                <button type="submit" class="">
                    ログイン
                </button>
            </form>
            <form action="/register" method="GET">
                <button type="submit" class="">
                    新規登録
                </button>
            </form>
        </div>
        @endauth
    </div>
</header>
