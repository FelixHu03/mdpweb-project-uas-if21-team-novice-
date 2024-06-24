<?php

namespace App\Http\Controllers;

use App\Models\jenis_kelamin;
use App\Models\kota;
use App\Models\layananTambahan;
use App\Models\pegawai;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = pegawai::all();
        return view('pegawai.index')-> with('pegawai', $pegawai);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kota = kota::all();
        $layanan = layananTambahan::all();
        $jenis_kelamin = jenis_kelamin::all();
        // dd($jenis_kelamin);
        return view('pegawai.create')
            ->with('kota', $kota)
            ->with('jenis_kelamin', $jenis_kelamin)
            ->with('layanan', $layanan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->user()->cannot('create', pegawai::class)){
            abort(403, 'anda tidak memiliki akses');
        }
        $val = $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_telepon' => 'required|string|min:12|max:20|unique:pegawais,no_telepon',
            'tanggal_lahir' => 'required',
            'kota_id' => 'required',
            'id_layanan' => 'required',
            'url_foto' => 'required|file|mimes:png,jpg|max:5000'
        ]);
        // rename file, misalnya: 2327250059.png
        // ambil ext file
        $ext = $request->url_foto->getClientOriginalExtension(); //untuk ambil extensi png/jpg
        $val['url_foto'] = $request->nama . "." . $ext;
        // upload file bisa pakai move(), storeAs()
        $request->url_foto->move('foto', $val['url_foto']);
        // foto: folder tujuan public/foto


        // simpan ke dalam tabel fakultas
        pegawai::create($val);
        // redirect ke route fakultas
        return redirect()->route('pegawai.index')
            ->with('success', $val['nama'] . ' berhasil disimpan');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(pegawai $pegawai ,Request $request)
    {
        if($request->user()->cannot('view', $pegawai)){
            abort(403, 'anda tidak memiliki akses');
        }
        return view('pegawai.show')
            ->with('pegawai', $pegawai);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pegawai $pegawai)
    {
        $layanan = layananTambahan::all();
        $kota = kota::all();
        $jenis_kelamin = jenis_kelamin::all();

        return view('pegawai.edit')
            ->with('layanan', $layanan)
            ->with('kota', $kota)
            ->with('jenis_kelamin', $jenis_kelamin)
            ->with('pegawai', $pegawai);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pegawai $pegawai)
    {
        if ($request->hasFile('url_foto')) {
            File::delete('foto/' . $pegawai['url_foto']);
            $val = $request->validate([
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
                'no_telepon' => 'required|string|min:12|max:20|unique:pegawais,no_telepon,' . $pegawai->id,
                'tanggal_lahir' => 'required',
                'kota_id' => 'required',
                'id_layanan' => 'required',
                'url_foto' => 'required|file|mimes:png,jpg|max:5000'
            ]);
            // rename file, misalnya: 2327250059.png
            // ambil ext file
            $ext = $request->url_foto->getClientOriginalExtension(); //untuk ambil extensi png/jpg
            $val['url_foto'] = $request->nama . "." . $ext;
            // upload file bisa pakai move(), storeAs()
            $request->url_foto->move('foto', $val['url_foto']);
            // foto: folder tujuan public/foto
        } else {
            $val = $request->validate([
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'alamat' => 'required',
                'tanggal_lahir' => 'required',
                'kota_id' => 'required',
                'id_layanan' => 'required',
            ]);
            // Mahasiswa::create($val);
            $pegawai->update($val);
            // redirect ke route fakultas

            return redirect()->route('pegawai.index')
                ->with('success', $val['nama'] . ' berhasil disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pegawai $pegawai)
    {
        // dd($pegawai);
        File::delete('foto/'.$pegawai['url_foto']);
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Data Berhasil dihapus');
    }
}
