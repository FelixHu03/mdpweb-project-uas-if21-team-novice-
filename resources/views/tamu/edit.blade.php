@extends('layout.main')
@section('title', 'Edit Tamu')
@section('halaman', 'Edit Tamu')
@section('namaHalaman', 'Edit Tamu')
@section('content')
    <h2>Edit Tamu</h2>
    <p>Ini halaman Edit Tamu</p>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Tamu</h4>
                    <p class="card-description">
                        {{-- Basic form layout --}}
                    </p>
                    <form class="forms-sample" action="{{ route('tamu.update', $tamu['id_tamu']) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- id tamu --}}
                        <div class="form-group">
                            <label for="id_tamu">ID Tamu</label>
                            <input type="text" class="form-control" name="id_tamu" placeholder="ID Tamu" value="{{ old('id_tamu') ? old('id_tamu') : $tamu['id_tamu'] }}">
                            @error('id_tamu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        {{-- nama --}}
                        <div class="form-group">
                            <label for="nama">Nama Tamu</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Tamu" value="{{ old('nama') ? old('nama') : $tamu['nama'] }}">
                            @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        {{-- Alamat --}}
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{ old('alamat') ? old('alamat') : $tamu['alamat'] }}">
                            @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        {{-- email --}}
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') ? old('email') : $tamu['email'] }}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        {{-- no telepon --}}
                        <div class="form-group">
                            <label for="no_telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" name="no_telepon" placeholder="Nomor Telepon" value="{{ old('no_telepon') ? old('no_telepon') : $tamu['no_telepon'] }}">
                            @error('no_telepon')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="{{ url('tamu') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
