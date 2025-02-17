@extends('layouts.shop_common')
@section('title', 'kanri dashboard')
@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="font-bold text-center text-2xl">管理者メニュー</h1>
        <div class="w-full flex justify-center mt-10 space-x-3">
            <a href="{{ route('kanri.dashboard')}}" class="text-md underline underline-offset-4">売上統計</a>
            <a href="{{ route('item.regIndex') }}" class="text-md underline underline-offset-4">新商品登録</a>
            <a href="{{ route('kanri.items') }}" class="text-md underline underline-offset-4">商品管理</a>
            <a href="{{ route('order.index')}}" class="text-md underline underline-offset-4">注文管理</a>
            <a href="{{ route('kanri.users')}}" class="text-md underline underline-offset-4">会員一覧</a>
        </div>
        <div class="w-full flex justify-center mt-10">
            <canvas id="salesChart" class="w-1/2 h-48"></canvas>
        </div>
    </div>
    <script>
        const salesChart = document.getElementById('salesChart').getContext('2d');

        const data = {
            labels: {!! json_encode($dates) !!},
            datasets: [{
                label: '売上総計',
                data: {!! json_encode($totalSales) !!},
                backgroundColor: 'rbga(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: false,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const chart = new Chart(salesChart, config);
    </script>
@endsection
