@extends('template.base')

@section('content')
<style>
    .border-warning {
        border: 5px solid yellow;
    }
</style>

<div class="row">
    <div class="col-md-12 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-warning text-white border-warning">
                    <div class="card-body">
                        <center>
                            <h1>{{ $totalPesanan }}</h1>
                            <b>Total Pesanan</b>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-white border-warning">
                    <div class="card-body">
                        <center>
                            <h1>{{ $pesananBaru }}</h1>
                            <b>Pesanan Baru (Belum Proses)</b>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-white border-warning">
                    <div class="card-body">
                        <center>
                            <h1>Rp. {{ number_format($pendapatan) }}</h1>
                            <b>Total Pendapatan (Hari ini)</b>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card border-0 shadow">
            <div class="card-body">
                <canvas id="dailyRevenueChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <center>
                    <h3 style="color: rgb(233, 94, 13)" class="mb-3">Produk Terlaris</h3>
                </center>
                <canvas id="doughnutChart" width="550" height="550"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('dailyRevenueChart').getContext('2d');

    // Assuming `dates` and `dataPendapatanHarian` are passed from your backend to the frontend
    const dates = @json($dates);
    const dataPendapatanHarian = @json($data_pendapatan_harian);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dates,
            datasets: [{
                label: 'Pendapatan Harian Selama 1 Minggu Terakhir',
                data: dataPendapatanHarian,
                borderWidth: 1,
                borderColor: 'blue',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    // Data untuk doughnut chart
    var doughnutData = {
        labels: @json($topMenus->pluck('menu.menu_nama')),
        datasets: [{
            data: @json($topMenus->pluck('total')),
            borderColor: 'yellow',
            borderWidth: 5,
            backgroundColor: [
                'rgb(233, 94, 13)',
                'rgb(54, 162, 235)',
                'rgb(255, 206, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)'
            ]
        }]
    };

    // Inisialisasi doughnut chart
    var doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
    var doughnutChart = new Chart(doughnutCtx, {
        type: 'doughnut',
        data: doughnutData
    });
</script>
@endsection
