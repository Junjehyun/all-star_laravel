<header class="shadow-sm text-gray-900 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/item_index" class="text-xl font-bold">XYZ MART</h1>
        <nav>
            <div class="flex space-x-4">
                <div class="flex flex-row items-center justify-center space-x-4 mt-2">
                    @auth
                        <form action="{{ route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="text-lg">
                                ログアウト
                            </button>
                        </form>
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
                    {{-- <a href="/item_top" class="text-center text-md px-1">TOP</a>
                    <a href="/item_bottom" class="text-center text-md px-1">BOTTOM</a>
                    <a href="/item_shoes" class="text-center text-md px-1">SHOES</a>
                    <a href="#" class="text-center text-md px-1">ETC</a>
                    <a href="#" class="text-center text-md text-red-500 font-semibold hover:underline">SALE</a> --}}
                    <a href="/cart_index">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/></svg>
                    </a>
                    <a href="/order_list">
                        注文履歴
                    </a>
                </div>
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
