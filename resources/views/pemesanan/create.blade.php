@extends('layout.main')
@section('title', 'Pemesanan Kamar')
@section('halaman', 'Pegawai')
@section('namaHalaman', 'Tambah Pemesanan')
@section('content')
<h2>Halaman Pemesanan</h2>
<p>Ini halaman Tambah pemesanan kamar</p>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Layanan Pemesanan</h4>
                <p class="card-description">Silahkan pesan kamar di Hotel kami.</p>
                <form class="forms-sample" action="{{ route('pemesanan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="tgl_check_in">Tanggal Check In</label>
                        <input type="date" class="form-control" name="tgl_check_in" id="tgl_check_in" placeholder="Tanggal Check In" value="{{ old('tgl_check_in') }}">
                        @error('tgl_check_in')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_check_out">Tanggal Check Out</label>
                        <input type="date" class="form-control" name="tgl_check_out" id="tgl_check_out" placeholder="Tanggal Check Out" value="{{ old('tgl_check_out') }}">
                        @error('tgl_check_out')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tipe_kamar">Tipe Kamar</label>
                        <select name="tipe_kamar" id="tipe_kamar" class="form-control">
                            @foreach ($kamar as $kamars)
                            <option value="{{ $kamars->id_kamar }}" data-harga="{{ $kamars->harga }}">{{ $kamars->tipe_kamar }}</option>
                            @endforeach
                        </select>
                        @error('tipe_kamar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_tamu">Tamu</label>
                        <select name="id_tamu" id="id_tamu" class="form-control">
                            @foreach ($tamu as $tms)
                            <option value="{{ $tms->id_tamu }}">{{ $tms->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_tamu')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="layanan_tambahan">Layanan Tambahan</label>
                        <select name="layanan_tambahan" id="layanan_tambahan" class="form-control">
                            @foreach ($layanan as $layanans)
                            <option value="{{ $layanans->id_layanan }}" data-harga="{{ $layanans->harga_layanan_tambahan }}">{{ $layanans->nama_layanan }}</option>
                            @endforeach
                        </select>
                        @error('layanan_tambahan')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="total_biaya">Total Biaya</label>
                        <input type="text" class="form-control" name="total_biaya" id="total_biaya" placeholder="Total Biaya" readonly value="{{ old('total_biaya') }}">
                        @error('total_biaya')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_bayar">Status Bayar</label>
                        <select name="status_bayar" id="status_bayar" class="form-control">
                            <option value="" disabled selected hidden>Status Pembayaran</option>
                            <option value="Paid">Paid</option>
                            <option value="Unpaid">Unpaid</option>
                        </select>
                        @error('status_bayar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div><br>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ url('pemesanan') }}" class="btn btn-light">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>document.addEventListener('DOMContentLoaded', function () {
    function calculateTotal() {
        const checkInDate = new Date(document.getElementById('tgl_check_in').value);
        const checkOutDate = new Date(document.getElementById('tgl_check_out').value);
        const timeDiff = checkOutDate - checkInDate;
        const daysDiff = timeDiff / (1000 * 3600 * 24);

        const tipeKamarSelect = document.getElementById('tipe_kamar');
        const tipeKamarHarga = parseFloat(tipeKamarSelect.options[tipeKamarSelect.selectedIndex].getAttribute('data-harga'));

        const layananTambahanSelect = document.getElementById('layanan_tambahan');
        let layananTambahanHarga = parseFloat(layananTambahanSelect.options[layananTambahanSelect.selectedIndex].getAttribute('data-harga')) || 0;

        if (isNaN(layananTambahanHarga)) {
            layananTambahanHarga = 0;
        }

        if (daysDiff > 0) {
            const totalBiaya = (daysDiff * tipeKamarHarga) + layananTambahanHarga;
            document.getElementById('total_biaya').value = totalBiaya.toFixed(2);
        } else {
            document.getElementById('total_biaya').value = 0;
        }
    }

    document.getElementById('tgl_check_in').addEventListener('change', calculateTotal);
    document.getElementById('tgl_check_out').addEventListener('change', calculateTotal);
    document.getElementById('tipe_kamar').addEventListener('change', calculateTotal);
    document.getElementById('layanan_tambahan').addEventListener('change', calculateTotal);
});

</script>
@endsection
