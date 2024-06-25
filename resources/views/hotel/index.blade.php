@extends('layout.main')
@section('title', 'List Hotel')
@section('halaman', 'Dashboard')
@section('namaHalaman', 'Dashboard')
@section('content')
@can('viewAny', App\Models\Hotel::class)
    


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Banyak Jenis Kelamin pada Bidang Pegawai Hotel LIOX</h5>

            <!-- Column Chart -->
            <div id="columnChart" style="min-height: 365px;">

            </div>
            <!-- End Column Chart -->
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#columnChart"), {
                        series: [
                            {
                                name: 'Laki-Laki',
                                data: [
                                    @foreach($hotelJK as $htjk)
                                        '{{ $htjk->Laki_Laki  }}',
                                    @endforeach
                                ]
                            },
                            {
                                name: 'Perempuan',
                                data: [
                                    @foreach($hotelJK as $htjk)
                                        '{{ $htjk->Perempuan  }}',
                                    @endforeach
                                ]
                            }
                        ],
                        chart: {
                            type: 'bar',
                            height: 350
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '55%',
                                endingShape: 'rounded'
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: [
                                @foreach($hotelJK as $htjk)
                                    '{{ $htjk->nama_layanan }}',
                                @endforeach
                            ],
                        },
                        yaxis: {
                            title: {
                                text: 'Banyak'
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return val + " orang"
                                }
                            }
                        }
                    }).render();
                });
            </script>
        </div>
    </div>
    <!-- Pie Chart -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Chart Banyak Pegawai Pada Bidang</h5>

            <!-- Pie Chart -->
            <canvas id="pieChart" style="max-height: 400px; display: block; box-sizing: border-box; height: 400px; width: 700px;" width="875" height="500"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#pieChart'), {
                        type: 'pie',
                        data: {
                            labels: [
                                @foreach($hotelJK as $htjk)
                                    '{{ $htjk->nama_layanan }}',
                                @endforeach
                            ],
                            datasets: [{
                                label: 'Jumlah Pegawai',
                                data: [
                                    @foreach($hotelLayanan as $hotel)
                                        {{ $hotel->jumlah }},
                                    @endforeach
                                ],
                                backgroundColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 205, 86)',
                                    // Tambahkan warna lain jika ada lebih banyak kategori
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                });
            </script>
            <!-- End Pie Chart -->
        </div>
    </div>
    @endcan
@endsection
