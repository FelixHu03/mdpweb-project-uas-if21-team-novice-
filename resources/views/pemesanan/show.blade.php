{{-- resources/views/pemesanan/show.blade.php --}}
@extends('layout.main')
@section('title', 'Detail Pemesanan')
@section('content')
<div class="row">
    <div class="col-log-12 grid-margin">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID Pemesanan</th>
                    <th scope="col">ID Tamu</th>
                    <th scope="col">Tanggal Check In</th>
                    <th scope="col">Tanggal Check Out</th>
                    <th scope="col">Tipe Kamar</th>
                    <th scope="col">Layanan Tambahan</th>
                    <th scope="col">Total Biaya</th>
                    <th scope="col">Status Bayar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $pemesanan->id }}</td>
                    <td>{{ $pemesanan->tamu->id_tamu }}</td>
                    <td>{{ $pemesanan->tgl_check_in }}</td>
                    <td>{{ $pemesanan->tgl_check_out }}</td>
                    <td>{{ $pemesanan->kamar->tipe_kamar }}</td>
                    <td>{{ $pemesanan->layananambahan->nama_layanan ?? '-' }}</td>
                    <td>{{ $pemesanan->total_biaya }}</td>
                    <td>{{ $pemesanan->status_bayar }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <a href="{{ url('pemesanan') }}" class="btn btn-dark">Back</a>

</div>
@endsection
