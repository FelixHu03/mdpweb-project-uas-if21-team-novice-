@extends('layout.main')
@section('title', 'List Layanan')
@section('halaman', 'Layanan Tambahan')
@section('namaHalaman', 'Layanan Tambahan')
@section('content')

    <div class="card">
        @can('create', App\Models\LayananTambahan::class)
            <a href="{{ route('layanan_tambahan.create') }}" class="btn btn-outline-primary">Tambah</a>
        @endcan
        <div class="card-body">

        <!-- Default Table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama Layanan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Confirm</th>
                </tr>
            </thead>
            <tbody>
                @foreach($layanan_tambahan as $lyn)
                <tr>
                    <td>{{ $lyn['nama_layanan'] }}</td>
                    <td>{{ $lyn['harga_layanan_tambahan'] }}</td>
                    <td>
                        @can('view', $lyn)
                            <a href="{{ route('layanan_tambahan.show', $lyn['id_layanan']) }}" class="btn btn-outline-info btn-sm btn-rounded">Show</a>

                        @endcan
                        @can('update', $lyn)
                            <a href="{{ route('layanan_tambahan.edit', $lyn['id_layanan']) }}" class="btn btn-outline-info btn-sm btn-rounded">Ubah</a>
                        @endcan
                        @can('delete', $lyn)
                            <form action="{{ route('layanan_tambahan.destroy', $lyn->id_layanan) }}" method="post" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm btn-rounded show_confirm" data-toggle="tooltip" data-nama="{{ $lyn['nama_layanan'] }}" title="Hapus">Hapus</button>
                            </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $layanan_tambahan->links()}}
        </div>
        <!-- End Default Table Example -->
        </div>
    </div>
@endsection
