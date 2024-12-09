@extends('layouts.common')

@section('title', 'index page')

@section('content')
<div class="grid grid-cols-2 gap-10 px-24 mt-24">
    <div class="bg-zinc-50 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
        <h1 class="text-center text-xl font-bold mb-6">掲示板タイプ CRUD</h1>
        @foreach($notices as $notice)
            {{-- <a href="{{ route('notice.show', $notice->id) }}">
                <div class="text-blue-700 text-sm">{{ $notice->author }}: {{ $notice->title }}</div>
            </a> --}}
        @endforeach
        <a href="notice_index">
            <h2 class="text-right text-sm mt-10 underline">詳しくはこちら</h2>
        </a>
    </div>
    <div class="bg-zinc-50 shadow-lg rounded-lg p-6 w-full h-auto flex flex-col justify-between">
        <h1 class="text-center text-xl font-bold mb-6">ショッピングモール</h1>
        <a href="/item_index">
            <h2 class="text-right text-sm mt-10 underline">ショッピングモールへ</h2>
        </a>
    </div>
    <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
        <h1 class="text-center text-xl font-bold mb-6">e-cal(会社の)</h1>
        <h2 class="text-center">まだスタートしてない状態です。</h2>
        <a href="">
            <h2 class="text-right text-sm mt-10 underline">more</h2>
        </a>
    </div>
    {{-- <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
        <h1 class="text-center text-xl font-bold mb-6"></h1>
        <a href="">
            <h2 class="text-right text-xs mt-10">more</h2>
        </a>
    </div> --}}
</div>
@endsection
