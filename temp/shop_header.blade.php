<header class="bg-zinc-100 shadow-lg text-gray-900 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/item_index" class="text-lg font-bold">XYZ MART</h1>
        <nav>
            <div class="flex space-x-6">
                <a href="/item_index" class="text-center text-sm py-1 px-1">ALL</a>
                <a href="/item_nike" class="text-center text-sm py-1 px-1" rounded-xl">nike</a>
                <a href="/item_adidas" class="text-center text-sm py-1 px-1" rounded-xl">adidas</a>
                <a href="/item_newbal" class="text-center text-sm py-1 px-1" rounded-xl">new balace</a>
                <a href="#" class="text-center text-sm py-1 px-1" rounded-xl">asics</a>
                <a href="" class="text-center text-sm py-1 px-1">その他</a>
                <a href="#" class="text-center text-sm py-1 px-1 text-red-500 font-semibold hover:underline">SALE</a>
                <a href="/cart_index" class="py-1 px-1">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="cart-count">{{ $count }}</span>
                </a>
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
            success: function(data) {
                $('.cart-count').text(data.count);
            },
            error: function() {
                console.error('エラーが発生しました。もう一度やり直してください。');
            }
        });
    }
    $(document).ready(function() {
        updateCartCount();
    });
</script>