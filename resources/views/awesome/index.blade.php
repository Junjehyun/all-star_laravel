@extends('layouts.common')

@section('title', 'index page')

@section('content')
<div class="flex justify-center mt-12">
    <div class="container w-1/2">
        <h1 class="text-center text-xl">Best Item</h1>
        <a href="">
            <h2 class="text-center mt-10">지금 바로 보러가기</h2>
        </a>
    </div>
    <div class="container w-1/2">
        <div>
            <h1 class="text-center text-xl mb-10">공지사항</h1>
            {{-- <table class="table table-striped">
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table> --}}
            <a href="">
                <h2 class="text-right text-xl mt-10">관리</h2>
            </a>
        </div>
    </div>
</div>
@endsection
