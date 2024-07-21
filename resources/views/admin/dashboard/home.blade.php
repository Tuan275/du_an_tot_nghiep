@extends('admin.layout.master')
@section('content')

<div class="content-header">
    <div class="container mx-auto">
        <div class="flex justify-between items-center py-4">
            <h1 class="text-2xl font-bold">Dashboard</h1>
            <nav>
                <ol class="flex space-x-2">
                    <li><a href="#" class="text-blue-600 hover:underline">Home</a></li>
                    <li class="text-gray-500">/ Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<section class="content">
    <div class="container mx-auto">
        <!-- Stat boxes -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-blue-500 text-white p-4 rounded-lg shadow">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-3xl font-bold">{{ $totalAppointments }}</h3>
                        <p>Số Lịch Đã Đặt</p>
                    </div>
                    <div class="text-5xl">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
                <a href="{{route('admin.appointment.list')}}" class="block mt-2 text-blue-200 hover:underline">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div class="bg-yellow-500 text-white p-4 rounded-lg shadow">
                <div class="flex justify-between items-center">
                    <div>
                        @if($mostUsedService)
                            <h3 class="text-3xl font-bold">{{ $mostUsedService->appointments_count }}</h3>
                            <p>Dịch Vụ Được Sử Dụng Nhiều Nhất: {{ $mostUsedService->name_service }}</p>
                        @else
                            <h3 class="text-3xl font-bold">0</h3>
                            <p>Chưa có dịch vụ nào</p>
                        @endif
                    </div>
                    <div class="text-5xl">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
                <a href="{{route('admin.appointment.list')}}" class="block mt-2 text-yellow-200 hover:underline">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div class="bg-green-500 text-white p-4 rounded-lg shadow">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-3xl font-bold">{{ number_format($totalRevenue, 0, ',', '.') }} VND</h3>
                        <p>Tổng Doanh Thu</p>
                    </div>
                    <div class="text-5xl">
                        <i class="ion ion-cash"></i>
                    </div>
                </div>
                <a href="{{route('admin.service.list')}}" class="block mt-2 text-green-200 hover:underline">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Biểu đồ tròn -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-4">Thống Kê Dịch Vụ Được Sử Dụng</h3>
            <canvas id="servicesChart" class="chart-canvas w-full"></canvas>
        </div>

        <!-- Biểu đồ cột -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-4">Thống Kê Doanh Thu Theo Tháng</h3>
            <canvas id="revenueChart" class="chart-canvas w-full"></canvas>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var servicesCtx = document.getElementById('servicesChart').getContext('2d');
        var servicesData = {
            labels: {!! json_encode($servicesUsage->pluck('name_service')) !!},
            datasets: [{
                data: {!! json_encode($servicesUsage->pluck('appointments_count')) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        };

        var servicesChart = new Chart(servicesCtx, {
            type: 'doughnut',
            data: servicesData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.raw;
                                return label;
                            }
                        }
                    }
                }
            }
        });

        var revenueCtx = document.getElementById('revenueChart').getContext('2d');
        var revenueData = {
            labels: {!! json_encode($monthlyRevenue->pluck('month')->map(function($month) { return \Carbon\Carbon::createFromDate(null, $month)->format('F'); })) !!},
            datasets: [{
                label: 'Doanh Thu (VND)',
                data: {!! json_encode($monthlyRevenue->pluck('total')) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        var revenueChart = new Chart(revenueCtx, {
            type: 'bar',
            data: revenueData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<style>
    .chart-canvas {
        max-width: 400px;
        max-height: 400px;
        width: 100%;
        height: 100%;
    }
</style>

@endsection
