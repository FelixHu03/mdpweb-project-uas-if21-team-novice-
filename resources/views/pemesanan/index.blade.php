@extends('layout.main')
@section('title', 'List Pemesanan')
@section('halaman', 'Pemesanan')
@section('namaHalaman', 'Pemesanan')
@section('content')
<div class="card">
    @can('create', App\Models\Pemesanan::class)
        
    <a href="{{ url('pemesanan/create') }}" class="btn btn-outline-primary m-2">Tambah</a>
    @endcan
    <div class="card-body">
        <h5 class="card-title">List Pemesanan</h5>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id Pemesanan</th>
                    <th scope="col">Tanggal Check In</th>
                    <th scope="col">Tanggal Check Out</th>
                    <th scope="col">Tipe Kamar</th>
                    <th scope="col">Layanan Tambahan</th>
                    <th scope="col">Total Biaya</th>
                    <th scope="col">Status Bayar</th>
                    <th scope="col">Confirm</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemesanan as $pms)
                <tr>
                    <td>{{ $pms->id_pemesanan }}</td>
                    <td>{{ $pms->tgl_check_in }}</td>
                    <td>{{ $pms->tgl_check_out }}</td>
                    <td>{{ $pms->kamar->tipe_kamar }}</td>
                    <td>{{ optional($pms->layananTambahan)->nama_layanan ?? 'Tidak Ada' }}</td>
                    <td>{{ number_format($pms->total_biaya, 2) }}</td>
                    <td>{{ $pms->status_bayar }}</td>
                    <td>
                        @can('view', $pms)
                        <a href="{{ route('pemesanan.show', $pms->id_pemesanan) }}" class="btn btn-outline-info btn-sm btn-rounded">Show</a>
                        @endcan
                        @can('update', $pms)
                            
                        <a href="{{ route('pemesanan.edit', $pms->id_pemesanan) }}" class="btn btn-outline-info btn-sm btn-rounded">Ubah</a>
                        @endcan
                        @can('delete', $pms)
                            
                        <form action="{{ route('pemesanan.destroy', $pms->id_pemesanan) }}" method="post" style="display: inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm btn-rounded show_confirm" data-toggle="tooltip" title="Hapus">Hapus</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection