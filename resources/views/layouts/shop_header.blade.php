<header class="bg-transparent shadow-xl text-gray-600 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/main_index" class="text-xl font-bold">xyz Mart</a>
        <nav>
            <div class="flex justify-end space-x-4">
                @auth
                    <button class="text-xs text-sky-700 underline">
                        {{ Auth::user()->name }}
                    </button>
                    <form action="{{ url('/cart_index') }}" method="GET" style="display: inline;">
                        @csrf
                        <button type="submit" class="text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                                <path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/>
                            </svg>
                        </button>
                    </form>
                    <form action="{{ url('/order_list') }}" method="GET" style="display: inline;">
                        @csrf
                        <button type="submit" class="text-xs">
                            ORDER LIST
                        </button>
                    </form>
                    <form action="{{ route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="text-xs">
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
                alert('エラーが発生しました。もう一度やり直してください!');
            }
        });
        $(document).ready(function () {
            updateCartCount();
        });
    }
</script>
