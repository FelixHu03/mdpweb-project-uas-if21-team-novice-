@extends('layout.main')
@section('title','List Layanan')
@section('halaman', 'Layanan Tambahan')
@section('namaHalaman', 'Detail Tambahan')
@section('content')

<div class="card">
  
  <a href="{{ url('layanan_tambahan/create') }}"  class="btn btn-outline-primary">Tambah</a>
  <div class="card-body">

      <!-- Default Table -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID Layanan</th>
            <th scope="col">Nama Layanan</th>
            <th scope="col">Harga</th>
          </tr>
        </thead>
        <tbody>
          <tr>
           
            <td>{{ $layanan_tambahan['id_layanan'] }}</td>
            <td>{{ $layanan_tambahan['nama_layanan'] }}</td>
            <td>{{ $layanan_tambahan['harga_layanan_tambahan'] }}</td>
            
          </tr>
        </tbody>
      </table>
      <a href="{{ url('layanan_tambahan') }}" class="btn btn-dark">Back</a>

      <!-- End Default Table Example -->
    </div>
  </div>
@endsection