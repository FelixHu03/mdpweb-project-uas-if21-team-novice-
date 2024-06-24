@extends('layout.main')
@section('title', 'Tamu')
@section('halaman', 'Detail Tamu')
@section('namaHalaman', 'Detail Tamu')
@section('content')
    <div class="row">
        <div class="col-log-12 grid-margin">
            <table class="table table-hover">
                <thead>
                    <th scope="col">ID Tamu</th>
                    <th scope="col">Nama Tamu</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nomor Telepon</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $tamu['id_tamu'] }}</td>
                        <td>{{ $tamu['nama'] }}</td>
                        <td>{{ $tamu['alamat'] }}</td>
                        <td>{{ $tamu['email'] }}</td>
                        <td>{{ $tamu['no_telepon'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="{{ url('tamu') }}" class="btn btn-dark">Back</a>
    </div>
@endsection
