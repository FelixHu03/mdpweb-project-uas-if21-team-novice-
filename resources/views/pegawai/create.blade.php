@extends('layout.main')
@section('title', 'Tambah Pegawai')
@section('halaman', 'Tambah')
@section('namaHalaman', 'Tambah Pegawai')
@section('content')
    <h2>Daftar Pegawai</h2>
    <p>Ini halaman Tambah Pegawai
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Pegawai</h4>
                    <p class="card-description">
                        {{-- Basic form layout --}}
                    </p>
                    <form class="forms-sample" action="{{ route('pegawai.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama pegawai"
                                value="{{ old('nama') }}">
                            @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        {{-- tempat lahir --}}
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir"
                                value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        {{-- tanggal Lahir --}}
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir"
                                value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                      {{-- jenis Kelammin --}}
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div>
                                @foreach ($jenis_kelamin as $jk)
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="jenis_kelamin"
                                            id="jenis_kelamin{{ $jk->id }}" value="{{ $jk->id }}"
                                            {{ old('jenis_kelamin') == $jk->id ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="jenis_kelamin{{ $jk->id }}">{{ $jk->jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan' }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('jenis_kelamin')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        {{-- alamat --}}
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat"
                                value="{{ old('alamat') }}">
                            @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><br>
                        {{-- no telepon --}}
                        <div class="form-group">
                            <label for="no_telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" name="no_telepon" placeholder="Nomor Telepon" value="{{ old('no_telepon') }}">
                            @error('no_telepon')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        {{-- kota --}}
                        <div class="form-group">
                            <label for="kota_id">Kota Domisili</label>
                            <select name="kota_id" id="" class="form-control" placeholder="Kota Kelahiran">
                                @foreach ($kota as $kotas)
                                    <option value="{{ $kotas['id'] }}"> {{ $kotas['nama'] }} </option>
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
                                    <option value="{{ $layan['id_layanan'] }}"> {{ $layan['nama_layanan'] }} </option>
                                @endforeach
                            </select>
                            @error('id_layanan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><br>
                        {{-- url foto --}}
                        <div class="form-group">
                            <label for="url_foto">Foto Pegawai</label>
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
