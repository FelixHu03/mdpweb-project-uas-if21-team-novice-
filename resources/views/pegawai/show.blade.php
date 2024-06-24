@extends('layout.main')
@section('title', 'Pegawai')
@section('halaman', 'Detail Pegawai')
@section('namaHalaman', 'Detail Pegawai')
@section('content')
    <div class="row">
        <div class="col-log-12 grid-margin">
            <table class="table table-hover">
                <thead>
                    <th scope="col">Foto</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Tempat, Tanggal Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Bidang</th>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="{{ url('foto/' . $pegawai['url_foto']) }}" alt="" style="width: 100px"></td>
                        <td>{{ $pegawai['id'] }}</td>
                        <td>{{ $pegawai['nama'] }}</td>
                        <td>{{ $pegawai['no_telepon'] }}</td>
                        <td>{{ $pegawai->jk->jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        <td>{{ $pegawai['tanggal_lahir'] }}</td>
                        <td>{{ $pegawai['tempat_lahir'] }}, {{ $pegawai['tanggal_lahir'] }}</td>
                        <td>{{ $pegawai['alamat'] }}</td>
                        <td>{{ $pegawai['kota']['nama'] }}</td>
                        <td>{{ $pegawai['id_layanan'] }}</td>
                    </tr>
                </tbody>
            </table>
            
        </div>
        <a href="{{ url('pegawai') }}" class="btn btn-dark">Back</a>
    </div>
@endsection
