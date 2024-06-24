@extends('layout.main')
@section('title', 'Edit Pegawai')
@section('halaman', 'Edit Pegawai')
@section('namaHalaman', 'Edit Pegawai')
@section('content')
    <h2>Edit Pegawai</h2>
    <p>Ini halaman Edit Pegawai
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Pegawai</h4>
                    <p class="card-description">
                        {{-- Basic form layout --}}
                    </p>
                    <form class="forms-sample" action="{{ route('pegawai.update', $pegawai['id']) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Pegawai"
                                value="{{ old('nama') ? old('nama') : $pegawai['nama'] }}">
                            @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        {{-- tempat lahir --}}
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir"
                                value="{{ old('tempat_lahir') ? old('tempat_lahir') : $pegawai['tempat_lahir'] }}">
                            @error('tempat_lahir')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        {{-- tanggal Lahir --}}
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir"
                                value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : $pegawai['tanggal_lahir'] }}">
                            @error('tanggal_lahir')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        {{-- jenis kelamin --}}
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="row">
                                @foreach ($jenis_kelamin as $jk)
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="jenis_kelamin"
                                                id="jenis_kelamin{{ $jk->id }}" value="{{ $jk->id }}"
                                                {{ old('jenis_kelamin') == $jk->id ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="jenis_kelamin{{ $jk->id }}">{{ $jk->jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan' }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @error('jenis_kelamin')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        {{-- alamat --}}
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat"
                                value="{{ old('alamat') ? old('alamat') : $pegawai['alamat'] }}">
                            @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><br>
                        {{-- no telepon --}}
                        <div class="form-group">
                            <label for="no_telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" name="no_telepon" placeholder="Nomor Telepon"
                                value="{{ old('no_telepon') ? old('no_telepon') : $pegawai['no_telepon'] }}">
                            @error('no_telepon')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- kota --}}
                        <div class="form-group">
                            <label for="kota_id">Kota Domisili</label>
                            <select name="kota_id" id="" class="form-control" placeholder="Kota">
                                @foreach ($kota as $kotas)
                                    <option value="{{ $kotas['id'] }}"
                                        {{ old('kota_id') == $kotas['id'] ? 'selected' : ($pegawai['kota_id'] == $kotas['id'] ? 'selected' : null) }}>
                                        {{ $kotas['nama'] }} </option>
                                @endforeach
                            </select>
                            @error('kota_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><br>
                        {{-- id layanan --}}
                        <div class="form-group">
                            <label for="id_layanan">Bidang</label>
                            <select name="id_layanan" id="" class="form-control" placeholder="Bidang Pelayanan">
                                @foreach ($layanan as $layan)
                                    <option value="{{ $layan['id_layanan'] }}"
                                        {{ old('id_layanan') == $layan['id_layanan'] ? 'selected' : ($pegawai['id_layanan'] == $layan['id_layanan'] ? 'selected' : null) }}>
                                        {{ $layan['nama_layanan'] }} </option>
                                @endforeach
                            </select>
                            @error('id_layanan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><br>
                        {{-- url foto --}}
                        <div class="form-group">
                            <label for="url_foto">File Foto</label>
                            <input type="file" class="form-control" name="url_foto">
                            @error('url_foto')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><br>


                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="{{ url('pegawai') }}" class="btn btn-dark">Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
