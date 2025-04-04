@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dashboard</h3>
        </div>
        <div class="card-body">
            <h2>Selamat datang, {{ $user->nama }}!</h2>
            <p>Ini adalah halaman utama dari aplikasi ini.</p>

            <hr>

            {{-- Grafik Penjualan per Tanggal --}}
            <h5>Grafik Penjualan Terakhir</h5>
            <canvas id="penjualanChart" height="100"></canvas>

            {{-- Grafik Sisa Stok Barang --}}
            <h5 class="mt-4">Grafik Sisa Stok Barang</h5>
            <canvas id="stokChart" height="100"></canvas>

            {{-- Grafik Top 5 Barang Terjual --}}
            <h5 class="mt-4">Top 5 Barang Terjual</h5>
            <div class="d-flex justify-content-center">
                <div style="max-width: 1000px;">
                    <canvas id="topBarangChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- Load Chart.js dari CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        console.log('halo');
        // Penjualan per Tanggal
        const penjualanLabels = @json($penjualanPerTanggal->pluck('tanggal')->reverse()->values());
        const penjualanData = @json($penjualanPerTanggal->pluck('total')->reverse()->values());

        console.log(penjualanLabels, penjualanData);
        console.log("Tipe penjualanLabels:", typeof penjualanLabels[0]);
        new Chart(document.getElementById('penjualanChart'), {
            type: 'line',
            data: {
                labels: penjualanLabels,
                datasets: [{
                    label: 'Jumlah Penjualan',
                    data: penjualanData,
                    fill: true,
                    borderColor: 'blue',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    tension: 0.3
                }]
            },
        });

        // Stok Barang
        const stokLabels = @json($stokBarang->pluck('barang_nama'));
        const stokData = @json($stokBarang->pluck('barang_stok'));

        console.log(stokLabels, stokData);

        new Chart(document.getElementById('stokChart'), {
            type: 'bar',
            data: {
                labels: stokLabels,
                datasets: [{
                    label: 'Sisa Stok',
                    data: stokData,
                    backgroundColor: 'orange',
                }]
            },
        });

        // Top 5 Barang Terjual
        const topBarangLabels = @json($topBarang->pluck('barang.barang_nama'));
        const topBarangData = @json($topBarang->pluck('total'));
        console.log(topBarangLabels, topBarangData);


        new Chart(document.getElementById('topBarangChart'), {
            type: 'pie',
            data: {
                labels: topBarangLabels,
                datasets: [{
                    data: topBarangData,
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF'
                    ]
                }]
            },
        });
    </script>
@endpush