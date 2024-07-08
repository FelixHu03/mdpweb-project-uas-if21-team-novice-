<?php

namespace App\Http\Controllers;

use App\Models\LayananTambahan;

use Illuminate\Http\Request;

class LayananTambahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan_tambahan = LayananTambahan::paginate(10);
        return view('layanan_tambahan.index')->with('layanan_tambahan', $layanan_tambahan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('layanan_tambahan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->user()->cannot('create', LayananTambahan::class)){
            abort(403, 'anda tidak memiliki akses');
        }
         $val = $request->validate([
            'id_layanan' => 'required',
            'nama_layanan' => 'required',
            'harga_layanan_tambahan' => 'required|integer',
        ]);

        LayananTambahan::create($val);

        // redirect ke route layanan_tambahan
        return redirect()->route('layanan_tambahan.index')
            ->with('success', $val['nama_layanan'].' berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(LayananTambahan $layanan_tambahan, Request $request)
    {
        if($request->user()->cannot('view', $layanan_tambahan)){
            abort(403, 'anda tidak memiliki akses');
        }
        return view('layanan_tambahan.show')
        ->with('layanan_tambahan', $layanan_tambahan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LayananTambahan $layanan_tambahan)
    {
        return view('layanan_tambahan.edit')->with('layanan_tambahan', $layanan_tambahan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LayananTambahan $layanan_tambahan)
    {
        $val = $request->validate([
            'id_layanan' => 'required|size:5|unique:layanan_tambahans,id_layanan,' . $layanan_tambahan->id_layanan . ',id_layanan',
            'nama_layanan' => 'required|max:255|unique:layanan_tambahans,nama_layanan,' . $layanan_tambahan->id_layanan . ',id_layanan',
            'harga_layanan_tambahan' => 'required|integer',
        ]);

        $layanan_tambahan->update($val);

        return redirect()->route('layanan_tambahan.index')->with('success', 'Layanan berhasil diperbarui');
    }
    public function destroy(LayananTambahan $layanan_tambahan)
    {
        $layanan_tambahan->delete();
        return redirect()->route('layanan_tambahan.index')->with('success', 'Data Berhasil dihapus');
    }

}