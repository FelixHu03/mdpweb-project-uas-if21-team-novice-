<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Kamar;
use App\Models\LayananTambahan;
use App\Models\Pemesanan;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::with('Kamar', 'LayananTambahan', 'Tamu')->get();
        return view('pemesanan.index', compact('pemesanan'));
    }

    public function create()
    {
        $kamar = Kamar::all();
        $layanan = LayananTambahan::all();
        $tamu = Tamu::all();

        $kamarPrices = $kamar->pluck('harga', 'id');
        $layananPrices = $layanan->pluck('harga', 'id');

        return view('pemesanan.create', compact('kamar', 'layanan', 'tamu', 'kamarPrices', 'layananPrices'));
    }

    public function store(Request $request)
    {
        if($request->user()->cannot('create', Pemesanan::class)){
            abort(403, 'anda tidak memiliki akses');
        }
        $validated = $request->validate([
            'tgl_check_in' => 'required|date',
            'tgl_check_out' => 'required|date|after:tgl_check_in',
            'tipe_kamar' => 'required|exists:kamars,id_kamar',
            'layanan_tambahan' => 'nullable|exists:layanan_tambahans,id_layanan',
            'status_bayar' => 'required|string'
        ]);

        // Calculate total biaya
        $tgl_check_in = new \DateTime($request->tgl_check_in);
        $tgl_check_out = new \DateTime($request->tgl_check_out);
        $interval = $tgl_check_in->diff($tgl_check_out)->days;

        $kamar = Kamar::find($request->tipe_kamar);
        $layanan = LayananTambahan::find($request->layanan_tambahan);

        $total_biaya = ($interval * $kamar->harga) + ($layanan ? $layanan->harga_layanan_tambahan : 0);

        $cekPemesanan = Pemesanan::where(DB::raw("YEAR(created_at)"), date("Y"))
            ->orderBy("id_pemesanan", "DESC")
            ->first();

        if (isset($cekPemesanan) && $cekPemesanan->id_pemesanan) {
            $exPlode = explode("-", $cekPemesanan->id_pemesanan);
            $getNo = $exPlode[2] + 1;
            if (strlen($getNo) === 3) {
                $nol = '';
            } elseif (strlen($getNo) === 2) {
                $nol = '00';
            } else {
                $nol = '000';
            }
            $no_urut = $nol . $getNo;
        } else {
            $no_urut = '0001';
        }

        $no_pemesanan = 'P-' . date('Y') . '-' . $no_urut;
        $value = [
            'id_pemesanan' => $no_pemesanan,
            'id_tamu' => $request->id_tamu,
            'tgl_check_in' => $request->tgl_check_in,
            'tgl_check_out' => $request->tgl_check_out,
            'id_kamar' => $request->tipe_kamar,
            'status_bayar' => $request->status_bayar,
            'total_biaya' => $total_biaya,
        ];

        Pemesanan::create($value);

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil disimpan');
    }

    public function show($id_pemesanan)
    {
        // Menggunakan nama relasi yang benar seperti yang didefinisikan di model Pemesanan
        $pemesanan = Pemesanan::with('Kamar', 'LayananTambahan', 'Tamu')->findOrFail($id_pemesanan);
    
        // dd($pemesanan->toArray());
    
        $kamar = Kamar::all();
        $layanan = LayananTambahan::all();
        $tamu = Tamu::all();
        return view('pemesanan.show', compact('pemesanan', 'kamar', 'layanan', 'tamu'));
    }
    

    public function edit($id_pemesanan)
    {
        $pemesanan = Pemesanan::findOrFail($id_pemesanan);
        $kamar = Kamar::all();
        $layanan = LayananTambahan::all();
        $tamu = Tamu::all();
        return view('pemesanan.edit', compact('pemesanan', 'kamar', 'layanan', 'tamu'));
    }


    public function update(Request $request, Pemesanan $pemesanan)
    {
        $validated = $request->validate([
            'tgl_check_in' => 'required|date',
            'tgl_check_out' => 'required|date|after:tgl_check_in',
            'tipe_kamar' => 'required|exists:kamars,id_kamar',
            'layanan_tambahan' => 'nullable|exists:layanan_tambahans,id_layanan',
            'status_bayar' => 'required|string'
        ]);
        // Calculate total biaya

        // Calculate total biaya
        $tgl_check_in = new \DateTime($request->tgl_check_in);
        $tgl_check_out = new \DateTime($request->tgl_check_out);
        $interval = $tgl_check_in->diff($tgl_check_out)->days;

        $kamar = Kamar::find($request->tipe_kamar);
        $layanan = LayananTambahan::find($request->layanan_tambahan);

        $total_biaya = ($interval * $kamar->harga) + ($layanan ? $layanan->harga_layanan_tambahan : 0);


        $value = [
            'id_tamu' => $request->id_tamu,
            'tgl_check_in' => $request->tgl_check_in,
            'tgl_check_out' => $request->tgl_check_out,
            'id_kamar' => $request->tipe_kamar,
            'status_bayar' => $request->status_bayar,
            'total_biaya' => $total_biaya,
        ];
        Pemesanan::create($value);

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil disimpan');
    }

   public function destroy($id_pemesanan)
{
    $pemesanan = Pemesanan::findOrFail($id_pemesanan); 

    if ($pemesanan) {
        $pemesanan->delete(); 
        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dihapus');
    } else {
        return redirect()->route('pemesanan.index')->with('error', 'Pemesanan tidak ditemukan');
    }
}
}
