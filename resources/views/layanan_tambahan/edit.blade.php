@extends('layout.main')
@section('title', 'Edit Layanan')
@section('halaman', 'Edit')
@section('namaHalaman', 'Edit Layanan')
@section('content')
    <p>Ini halaman Edit Layanan</p>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Layanan</h4>
                    <p class="card-description">
                        {{-- Basic form layout --}}
                    </p>
                    <form class="forms-sample" action="{{ route('layanan_tambahan.update', $layanan_tambahan->id_layanan) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="id_layanan">ID Layanan</label>
                            <input type="text" class="form-control" name="id_layanan" placeholder="Silahkan masukkan ID layanan"
                            value="{{ old('id_layanan') ? old('id_layanan') : $layanan_tambahan['id_layanan'] }}">

                            @error('id_layanan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_layanan">Nama Layanan</label>
                            <input type="text" class="form-control" name="nama_layanan" placeholder="Silahkan masukkan nama layanan"
                            value="{{ old('nama_layanan') ? old('nama_layanan') : $layanan_tambahan['nama_layanan'] }}">
                            @error('nama_layanan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga_layanan_tambahan">Harga Layanan</label>
                            <input type="text" class="form-control" name="harga_layanan_tambahan"
                                placeholder="Silahkan masukkan harga untuk layanan tambahan" 
                                value="{{ old('harga_layanan_tambahan') ? old('harga_layanan_tambahan') : $layanan_tambahan['harga_layanan_tambahan'] }}">
                            @error('harga_layanan_tambahan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="{{ url('layanan_tambahan') }}" class="btn btn-light">Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection