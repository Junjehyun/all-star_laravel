<header class="bg-transparent shadow-lg text-gray-600 p-3">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/item_index" class="text-xl font-bold hover:text-gray-300 transition-colors duration-300 px-5 py-3">XYZ_MART</a>
        <nav>
            <div class="flex justify-end space-x-4 mt-1">
                @auth
                    <form method="GET">
                        <button type="submit" class="text-md text-sky-700 underline underline-offset-4" formaction="{{ route('user.mypage') }}" formmethod="get">
                            {{ Auth::user()->name }}
                        </button>
                    </form>
                    <form action="{{ url('/cart_index') }}" method="GET" style="display: inline;">
                        @csrf
                        <button type="submit" class="text-md">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                                    <path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/>
                                </svg>
                                <span id="cart-count" class="cart-count mb-2">{{ $cartCount ?? '' }}</span>
                            </div>
                        </button>
                    </form>
                    <form action="{{ url('/order_list') }}" method="GET" style="display: inline;">
                        @csrf
                        <button type="submit" class="text-md">
                            ORDERS
                        </button>
                    </form>
                    <form action="{{ route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="text-md">
                            SIGN OUT
                        </button>
                    </form>
                @else
                    <div class="flex flex-row items-center justify-center space-x-4 mt-2">
                        <form action="/login" method="GET">
                            <button type="submit" class="text-xs">
                                SIGN IN
                            </button>
                        </form>
                        <form action="/register" method="GET">
                            <button type="submit" class="text-xs">
                                JOIN
                            </button>
                        </form>
                    </div>
                @endauth
                @auth
                    @if(Auth::user()->role === 'admin')
                        <form action="{{ route('kanri.dashboard') }}" method="GET">
                            <button class="mb-2 text-rose-500">管理</button>
                        </form>
                    @endif
                @endauth
            </div>
        </nav>
    </div>
</header>
<script>
    function updateCartCount() {
        $.ajax({
            url: '/cart_count',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#cart-count').text(data.count);
            },
            error: function () {
                alert('?? An error has occurred. Please try again.');
            }
        });
    }

    $(document).ready(function () {
            updateCartCount();
    });
</script>
