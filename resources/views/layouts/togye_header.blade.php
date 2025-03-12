<header class="bg-zinc-200 text-gray-700">
    <div class="mx-auto flex justify-between items-center px-7 py-4">
        <a href="/main_index" class="text-xl font-bold">(로고) 토계부(가제)</a>
        <nav>
            <div class="flex justify-end space-x-4">
                @auth
                    <form action="{{ route('logout')}}" method="POST">
                        @csrf
                        <button>마이페이지</button>
                        <button type="submit" class="text-md">
                            로그아웃
                        </button>
                    </form>
                @else
                    <div class="flex flex-row items-center justify-center space-x-4">
                        <form action="/login" method="GET">
                            <button type="submit" class="text-md">
                                로그인
                            </button>
                        </form>
                        <form action="/register" method="GET">
                            <button type="submit" class="text-md">
                                신규등록
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </nav>
    </div>
</header>
