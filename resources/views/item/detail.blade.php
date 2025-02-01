@extends('layouts.shop_common')
@section('title', 'Detail')
@section('content')
<div class="container w-full mx-auto mt-10">
    <h1 class="text-center text-2xl font-bold mb-6">{{ $item->name }}</h1>
    <div class="flex flex-col items-center">
        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/default-image.png') }}" alt="{{ $item->name }}" class="w-96 h-96 object-cover mb-6 border rounded-lg shadow-lg transition-all duration-300 hover:scale-130">
    </div>
    <div class="text-center space-y-4 mt-5">
        <p class="text-gray-700">PRICE: <span class="font-bold">{{ number_format($item->price) }}円</span></p>
        <p class="text-gray-700">SIZE: <span class="font-bold">
            @if(is_array($item->size))
                {{ implode(', ', $item->size) }}mm
            @else
                {{ $item->size }}mm
            @endif
        </p>
    </div>
    <div class="text-center mt-5">
        @if($item->averageRating())
            <span class="text-xl text-yellow-500">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= round($item->averageRating()))
                        <i class="fas fa-star"></i>
                    @else
                        <i class="far far-star"></i>
                    @endif
                @endfor
            </span>
            <span class="ml-2 text-sm text-gray-600">{{ round($item->averageRating(), 1) }}</span>
        @else
            <span class="text-sm text-gray-600">No reviews yet!</span>
        @endif
    </div>

    <div class="flex justify-center mt-8 space-x-3">
        <button class="px-4 py-2 outline outline-red-100 hover:bg-red-200 hover:text-white rounded-xl">BUY</button>
        <a href="{{ route(name: 'item.index') }}" class="px-4 py-2 outline outline-gray-100 hover:bg-gray-200 hover:text-white rounded-xl">RETURN</a>
        @auth
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('item.edit', $item->id) }}">
                    <button class="outline outline-gray-100 px-1 py-2 rounded-xl">EDIT</button>
                </a>
                <form action="{{ route('item.delete', $item->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか?')">
                    @csrf
                    <button class="outline outline-gray-100 px-1 py-2 rounded-xl">DELETE</button>
                </form>
            @endif
        @endauth
    </div>
    <div class="flex justify-center mt-10">
        <button id="like-button-{{ $item->id }}" onclick="likeItem({{ $item->id }})">
            <i class="fa-sharp fa-solid fa-2x fa-heart fa-beat" style="color: red;"></i> <!-- 기본 하트 아이콘 (좋아요 안 한 상태) -->
        </button>
        <span id="like-count-{{ $item->id }}" class="text-xl ml-2">
            {{ $item->like }}
        </span>
    </div>
    <div class="bg-white shadow-xl py-5 px-5 mt-5">
        {{-- <h2 class="flex justify-center text-2xl">REVIEW</h2> --}}
        @auth
        <form action="{{ route('review.store', $item->id) }}" method="POST" class="mt-5">
            @csrf
            <div class="flex items-center justify-center my-5 gap-3">
                <!-- 평점 (1~5) -->
                <div class="flex gap-1 mt-9">
                    <input type="radio" id="star5" name="rating" value="5" class="hidden peer" onclick="setRating(5)">
                    {{-- <label for="star5" class="cursor-pointer text-xl text-gray-300 hover:text-yellow-500">★</label> --}}
                    @for ($i = 1; $i <= 5; $i++)
                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden peer"
                        @if(old('rating') == $i) checked @endif onclick="setRating({{ $i }})">
                    <label for="star{{ $i }}" class="cursor-pointer text-2xl
                        {{ old('rating') >= $i ? 'text-yellow-500' : 'text-gray-300' }}
                        hover:text-yellow-500"><i class="fas fa-star"></i></label>
                    @endfor
                </div>
                <!-- 작성자 -->
                <div class="flex flex-col">
                    <label for="author" class="py-2 px-2">AUTHOR</label>
                    <input type="text" name="author" placeholder="AUTHOR" class="border border-gray-200 rounded-xl px-3 py-2 w-32" value="{{ old('author', Auth::user()->name) }}" required>
                </div>
                <!-- 리뷰 내용 -->
                <div class="flex flex-col">
                    <label for="content" class="py-2 px-2">REVIEW</label>
                    <input type="text" name="content" placeholder="Please review it." class="border border-gray-200 rounded-xl px-3 py-2 w-96" required>
                </div>
                <div class="flex flex-col mt-10">
                    <button type="submit" class="outline outline-gray-200 rounded-xl px-2 py-1">SEND</button>
                </div>
            </div>
        </form>
        @endauth

        <!-- 리뷰 리스트 -->
        <div class="mt-5 items-center">
            {{-- <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center mt-10">Review List</h3> --}}
            <div class="flex flex-col items-center">
                @foreach ($item->reviews as $review)
                    <div class="bg-white shadow-md w-full max-w-2xl rounded-lg p-4 mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <span class="text-lg font-semibold text-gray-700">{{ $review->author }}</span>
                                <!-- 별점 표시를 유저명 옆에 추가 -->
                                <div class="ml-3 flex space-x-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->rating)
                                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.386 2.46a1 1 0 00-.364 1.118l1.287 3.97c.3.921-.755 1.688-1.54 1.118L10 13.347l-3.385 2.46c-.784.57-1.838-.197-1.539-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.42 9.397c-.783-.57-.38-1.81.588-1.81h4.18a1 1 0 00.951-.69l1.286-3.97z"/>
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.386 2.46a1 1 0 00-.364 1.118l1.287 3.97c.3.921-.755 1.688-1.54 1.118L10 13.347l-3.385 2.46c-.784.57-1.838-.197-1.539-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.42 9.397c-.783-.57-.38-1.81.588-1.81h4.18a1 1 0 00.951-.69l1.286-3.97z"/>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <span class="text-sm text-gray-500">{{ $review->created_at->format('F j, Y') }}</span>
                        </div>
                        <p class="text-gray-600">{{ $review->content }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    function likeItem(id) {
    $.ajax({
        url: `/item/like/${id}`,
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
        },
        success: function(response) {
            if (response.success) {
                // 좋아요 수 업데이트
                $('#like-count-' + id).text(response.like_count);

                // 이미 좋아요를 누른 경우
                if (response.already_liked) {
                    alert('You have already liked this item');
                } else {
                    // 좋아요 아이콘을 활성화된 상태로 바꿔주기
                    $('#like-button-' + id + ' i').removeClass('fa-beat').addClass('fa-heart');
                    $('#like-button-' + id).css('color', 'red'); // 색상 변경 (채워진 하트)
                    $('#like-button-' + id).prop('disabled', true); // 좋아요 버튼 비활성화
                }
            } else {
                alert('Processing failed.');
            }
        },
        error: function() {
            alert('An error has occurred. Please try again.');
        }
    });
}
    // 별점 처리 (JavaScript로 동적으로 처리)
    function setRating(rating) {
        const labels = document.querySelectorAll('label');
        const radios = document.querySelectorAll('input[name="rating"]');

        // 모든 별의 색상을 회색으로 초기화
        labels.forEach((label, index) => {
            label.classList.remove('text-yellow-500');
            label.classList.add('text-gray-300');
        });

        // 선택한 별점까지 색상을 노란색으로 변경
        for (let i = 0; i < rating; i++) {
            labels[i].classList.remove('text-gray-300');
            labels[i].classList.add('text-yellow-500');
        }

        // 해당 라디오 버튼을 체크
        radios.forEach(radio => {
            if (radio.value == rating) {
                radio.checked = true;
            } else {
                radio.checked = false;
            }
        });

        // 선택된 별점을 콘솔에 출력
        console.log('Selected Rating: ' + rating);
    }
</script>
@endsection
