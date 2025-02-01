@extends('layouts.common')

@section('title', 'index page')

@section('content')
<div class="flex justify-center mt-5">
    <h1 class="text-gray-700 text-bold text-2xl">LIST</h1>
</div>
<div class="flex justify-center">
    <div class="grid grid-cols-3 gap-10 px-24 mt-24">
        <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
            <h1 class="text-center text-xl font-bold mb-6">STRESS_SYSTEM</h1>
            <h2 class="text-center">Not Started yet</h2>
            <a href="">
                <h2 class="text-right text-xs mt-10">more</h2>
            </a>
        </div>
        <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
            <h1 class="text-center text-xl font-bold mb-6">SMART_HOSPITAL</h1>
            <h2 class="text-center">Not Started yet</h2>
            <a href="">
                <h2 class="text-right text-xs mt-10">more</h2>
            </a>
        </div>
        <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
            <h1 class="text-center text-xl font-bold mb-6">E_CAL</h1>
            <h2 class="text-center">Not Started yet</h2>
            <a href="">
                <h2 class="text-right text-sm mt-10 underline">more</h2>
            </a>
        </div>
        <div class="bg-green-400 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
            <h1 class="text-center text-xl font-bold mb-6">FREEBOARD_TYPE_BOARD</h1>
            <h2 class="text-center text-gray-700 font-semibold">COMPLETE</h2>
            <a href="notice_index">
                <h2 class="text-right text-sm mt-10 underline">more</h2>
            </a>
        </div>
        <div class="bg-green-400 shadow-lg rounded-lg p-6 w-full h-auto flex flex-col justify-between">
            <h1 class="text-center text-xl font-bold mb-6">XYZ_MART</h1>
            <h2 class="text-center text-gray-700 font-semibold">COMPLETE</h2>
            <a href="/item_index">
                <h2 class="text-right text-sm mt-10 underline">more</h2>
            </a>
        </div>
        <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
            <h1 class="text-center text-xl font-bold mb-6">TOGYEBU</h1>
            <h2 class="text-center">Not Started yet</h2>
            <a href="">
                <h2 class="text-right text-xs mt-10 underline">more</h2>
            </a>
        </div>
        <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
            <h1 class="text-center text-xl font-bold mb-6">REALTIME_CHATTING_SERVICE</h1>
            <h2 class="text-center">Not Started yet</h2>
            <a href="">
                <h2 class="text-right text-xs mt-10 underline">more</h2>
            </a>
        </div>
    </div>
</div>
@endsection
