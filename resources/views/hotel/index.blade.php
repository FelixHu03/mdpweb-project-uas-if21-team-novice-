@extends('layout.main')
@section('title', 'List Hotel')
@section('halaman', 'Dashboard')
@section('namaHalaman', 'Dashboard')
@section('content')
<h4>Hotel LIOX</h4>
<article>
    Selamat datang di Hotel LIOX, destinasi akomodasi mewah yang memadukan kenyamanan modern dengan sentuhan elegan.
    Terletak strategis di jantung kota, Hotel LIOX menawarkan pengalaman menginap yang luar biasa dengan pemandangan
    menakjubkan,
    layanan berkualitas tinggi, dan fasilitas kelas dunia yang dirancang untuk memenuhi kebutuhan setiap tamu.
</article>
<h4>Fasilitas</h4><br>
<article>
    Hotel LIOX dilengkapi dengan berbagai fasilitas untuk memastikan kenyamanan dan kemudahan Anda selama menginap:
    <span>
        <ol>
            <ul>Kolam Renang Infinity: Bersantai di tepi kolam renang infinity kami sambil menikmati pemandangan kota
                yang
                spektakuler.
            </ul>
            <ul>
                Pusat Kebugaran: Tetap bugar selama perjalanan Anda dengan fasilitas gym modern yang tersedia 24 jam.
            </ul>
            <ul>
                Rooftop Bar: Untuk merasakan suasana dingin yang sunyi ditengah daerah perkotaan yang ramai ditemani kehangatan dari kopi dan teh.
            </ul>
            <ul>
                Ruang Pertemuan dan Ballroom: Hotel LIOX menyediakan ruang pertemuan dan ballroom yang ideal untuk acara
                bisnis
                dan
                sosial, dilengkapi dengan teknologi canggih dan layanan profesional.
            </ul>
        </ol>
    </span>
</article>
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
                            series: [{
                                    name: 'Laki-Laki',
                                    data: [
                                        @foreach ($hotelJK as $htjk)
                                            '{{ $htjk->Laki_Laki }}',
                                        @endforeach
                                    ]
                                },
                                {
                                    name: 'Perempuan',
                                    data: [
                                        @foreach ($hotelJK as $htjk)
                                            '{{ $htjk->Perempuan }}',
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
                                    @foreach ($hotelJK as $htjk)
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
                <canvas id="pieChart"
                    style="max-height: 400px; display: block; box-sizing: border-box; height: 400px; width: 700px;"
                    width="875" height="500"></canvas>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new Chart(document.querySelector('#pieChart'), {
                            type: 'pie',
                            data: {
                                labels: [
                                    @foreach ($hotelJK as $htjk)
                                        '{{ $htjk->nama_layanan }}',
                                    @endforeach
                                ],
                                datasets: [{
                                    label: 'Jumlah Pegawai',
                                    data: [
                                        @foreach ($hotelLayanan as $hotel)
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
