<header class="bg-transparent shadow-xl text-gray-600 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/main_index" class="text-xl font-bold">web service collection</a>
        <nav>
            <div class="flex justify-end space-x-4">
                @auth
                    <form action="{{ route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm">
                            SIGN OUT
                        </button>
                    </form>
                @else
                    <div class="flex flex-row items-center justify-center space-x-4 mt-2">
                        <form action="/login" method="GET">
                            <button type="submit" class="text-sm">
                                SIGN IN
                            </button>
                        </form>
                        <form action="/register" method="GET">
                            <button type="submit" class="text-sm">
                                JOIN
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </nav>
    </div>
</header>
