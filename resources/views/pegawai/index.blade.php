@extends('layout.main')

@section('title', 'List Pegawai')

@section('halaman', 'Pegawai')

@section('namaHalaman', 'Daftar Pegawai')

@section('content')
<div class="card">
    @can('create', App\Models\Pegawai::class)
    <a href="{{ url('pegawai/create') }}" class="btn btn-outline-primary">Tambah</a>
    @endcan
    <div class="card-body">
        <!-- Default Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Bidang</th>
                    <th scope="col">Confirm</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawai as $pgw)
                <tr>
                    <td><img src="{{ url('foto/' . $pgw['url_foto']) }}" alt="Foto {{ $pgw['nama'] }}" style="width: 75px;"></td>
                    <td>{{ $pgw['nama'] }}</td>
                    <td>{{ $pgw->kota->nama }}</td>
                    <td>{{ $pgw->layanan->nama_layanan }}</td>
                    <td>
                        @can('view', $pgw)
                        <a href="{{ route('pegawai.show', $pgw['id']) }}" class="btn btn-outline-info btn-sm btn-rounded">Show</a>
                        @endcan
                        @can('update', $pgw)
                        <a href="{{ route('pegawai.edit', $pgw['id']) }}" class="btn btn-outline-info btn-sm btn-rounded">Edit</a>
                        @endcan
                        @can('delete', $pgw)
                        <form action="{{ route('pegawai.destroy', $pgw->id) }}" method="post" style="display: inline;">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm btn-rounded show_confirm" data-toggle="tooltip" data-nama="{{ $pgw['nama'] }}" title="Hapus">Hapus</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $pegawai->links() }}
        </div>
        <!-- End Default Table Example -->
    </div>
</div>
@endsection
