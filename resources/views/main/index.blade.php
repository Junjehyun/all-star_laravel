@extends('layouts.common')

@section('title', 'index page')

@section('content')
<div class="flex justify-center mt-5">
    <h1 class="text-gray-700 text-bold text-2xl">List</h1>
</div>
<div class="flex justify-center">
    <div class="grid grid-cols-3 gap-10 px-24 mt-24">
        <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
            <h1 class="text-center text-xl font-bold mb-6">STRESS SYSTEM</h1>
            <h2 class="text-center">Not Started yet</h2>
            <a href="">
                <h2 class="text-right text-xs mt-10">more</h2>
            </a>
        </div>
        <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
            <h1 class="text-center text-xl font-bold mb-6">SMART HOSPITAL</h1>
            <h2 class="text-center">Not Started yet</h2>
            <a href="">
                <h2 class="text-right text-xs mt-10">more</h2>
            </a>
        </div>
        <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
            <h1 class="text-center text-xl font-bold mb-6">e-cal</h1>
            <h2 class="text-center">Not Started yet</h2>
            <a href="">
                <h2 class="text-right text-sm mt-10 underline">more</h2>
            </a>
        </div>
        <div class="bg-zinc-50 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
            <h1 class="text-center text-xl font-bold mb-6">Freeboard Type CRUD</h1>
            <h2 class="text-center text-rose-500 font-semibold">Working</h2>
            <a href="notice_index">
                <h2 class="text-right text-sm mt-10 underline">more</h2>
            </a>
        </div>
        <div class="bg-zinc-50 shadow-lg rounded-lg p-6 w-full h-auto flex flex-col justify-between">
            <h1 class="text-center text-xl font-bold mb-6">Shopping Mall</h1>
            <h2 class="text-center text-rose-500 font-semibold">Working</h2>
            <a href="/item_index">
                <h2 class="text-right text-sm mt-10 underline">more</h2>
            </a>
        </div>
        <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
            <h1 class="text-center text-xl font-bold mb-6">Togyebu</h1>
            <h2 class="text-center">Not Started yet</h2>
            <a href="">
                <h2 class="text-right text-xs mt-10 underline">more</h2>
            </a>
        </div>
        <div class="bg-yellow-200 shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
            <h1 class="text-center text-xl font-bold mb-6">Realtime Chatting Service</h1>
            <h2 class="text-center">Not Started yet</h2>
            <a href="">
                <h2 class="text-right text-xs mt-10 underline">more</h2>
            </a>
        </div>
    </div>
</div>
@endsection
