@extends('layout.main')
@section('title', 'Kamar Hotel LIOX')
@section('halaman', 'Detail Kamar Hotel LIOX')
@section('namaHalaman', 'Detai Hotel')
@section('content')
    <div class="row">
        <div class="col-log-12 grid-margin">
            <table class="table table-hover">
                <thead>
                    
                    <th scope="col">Foto</th>
                    <th scope="col">ID Kamar</th>
                    <th scope="col">Tipe Kamar</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Status</th>
                </thead>
                <tbody>
                    @foreach ($kamar as $kmr)
          <tr>
            <td><img src="{{ url('foto_kamar/' . $kmr['url_foto']) }}" alt="" style="width: 100px"></td>
            <td>{{ $kmr['id_kamar'] }}</td>
            <td>{{ $kmr['tipe_kamar'] }}</td>
            <td>{{ $kmr['harga'] }}</td>
            <td>{{ $kmr['Status'] }}</td>
            
          </tr>
          @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ url('kamar') }}" class="btn btn-dark">Back</a>
    </div>
@endsection
