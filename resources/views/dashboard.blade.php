<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div> --}}
    <div class="flex justify-center mt-5">
        <h1 class="text-gray-700 text-bold text-2xl">作業まとめ一覧</h1>
    </div>
    <div class="flex justify-center">
        <div class="grid grid-cols-3 gap-10 px-24 mt-24">
            <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
                <h1 class="text-center text-xl font-bold mb-6">STRESS SYSTEM(会社の)</h1>
                <h2 class="text-center">まだスタートしてない状態です。</h2>
                <a href="">
                    <h2 class="text-right text-xs mt-10">more</h2>
                </a>
            </div>
            <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
                <h1 class="text-center text-xl font-bold mb-6">SMART HOSPITAL(会社の)</h1>
                <h2 class="text-center">まだスタートしてない状態です。</h2>
                <a href="">
                    <h2 class="text-right text-xs mt-10">more</h2>
                </a>
            </div>
            <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
                <h1 class="text-center text-xl font-bold mb-6">e-cal(会社の)</h1>
                <h2 class="text-center">まだスタートしてない状態です。</h2>
                <a href="">
                    <h2 class="text-right text-sm mt-10 underline">more</h2>
                </a>
            </div>
            <div class="bg-zinc-50 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
                <h1 class="text-center text-xl font-bold mb-6">掲示板タイプ CRUD</h1>
                <h2 class="text-center text-rose-500 font-semibold">作業中</h2>
                <a href="notice_index">
                    <h2 class="text-right text-sm mt-10 underline">詳しくはこちら</h2>
                </a>
            </div>
            <div class="bg-zinc-50 shadow-lg rounded-lg p-6 w-full h-auto flex flex-col justify-between">
                <h1 class="text-center text-xl font-bold mb-6">ショッピングモール</h1>
                <h2 class="text-center text-rose-500 font-semibold">作業中</h2>
                <a href="/item_index">
                    <h2 class="text-right text-sm mt-10 underline">ショッピングモールへ</h2>
                </a>
            </div>
            <div class="bg-green-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
                <h1 class="text-center text-xl font-bold mb-6">토계부(필살기)</h1>
                <h2 class="text-center">まだスタートしてない状態です。</h2>
                <a href="">
                    <h2 class="text-right text-xs mt-10">more</h2>
                </a>
            </div>
            <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
                <h1 class="text-center text-xl font-bold mb-6">リアルタイムチャットサービス</h1>
                <h2 class="text-center">まだスタートしてない状態です。</h2>
                <a href="">
                    <h2 class="text-right text-xs mt-10">more</h2>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
