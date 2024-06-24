@extends('layout.main')
@section('title', 'Kamar')
@section('halaman', 'Kamar')
@section('content')
    <p>Ini halaman Kamar</p>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Booking Kamar</h4>
                    <p class="card-description">
                        {{-- Basic form layout --}}
                    </p>
                    <form class="forms-sample" action="{{ route('kamar.update', $kamar['id_kamar']) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- id Kamar --}}
                        <div class="form-group">
                            <label for="id_kamar">ID Kamar</label>
                            <input type="text" class="form-control" name="id_kamar" placeholder="ID Kamar"
                                value="{{ old('id_kamar') ? old('id_kamar') : $kamar['id_kamar']}}">
                            @error('id_kamar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="tipe_Kamar">Tipe Kamar</label>
                            <input type="text" class="form-control" name="tipe_kamar" placeholder="Tipe kamar"
                            value="{{ old('tipe_kamar') ? old('tipe_kamar') : $kamar['tipe_kamar']}}">
                            @error('tipe_kamar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" name="harga"
                                placeholder="Harga"
                                value="{{ old('harga') ? old('harga') : $kamar['harga']}}">

                            @error('harga')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Status">Status</label>
                            <select class="form-control" name="status">
                                @foreach($statuses as $status)
                                    <option value="{{ $status }}" {{ old('Status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @error('status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="url_foto">Foto Kamar</label>
                            <input type="file" class="form-control" name="url_foto">
                            @error('url_foto')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><br>

                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="{{ url('layanan_tambahan') }}" class="btn btn-light">Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection