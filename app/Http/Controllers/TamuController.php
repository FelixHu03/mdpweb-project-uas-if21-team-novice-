<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tamu = Tamu::all();
        return view('tamu.index')->with('tamu', $tamu);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tamu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'id_tamu'=> 'required|unique:tamus',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|email|max:255|unique:tamus',
            'no_telepon' => 'required|max:15|unique:tamus'
        ]);

        Tamu::create($val);

        return redirect()->route('tamu.index')
            ->with('success', $val['nama'] . ' berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tamu $tamu)
    {
        return view('tamu.show')->with('tamu', $tamu);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tamu $tamu)
    {
        return view('tamu.edit')->with('tamu', $tamu);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tamu $tamu)
    {
        $val = $request->validate([
            'id_tamu' => 'required|unique:tamus,id_tamu,' . $tamu->id_tamu . ',id_tamu',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:tamus,email,' . $tamu->id_tamu . ',id_tamu',
            'no_telepon' => 'required|string|max:15|unique:tamus,no_telepon,' . $tamu->id_tamu . ',id_tamu'
        ]);

        $tamu->update($val);

        return redirect()->route('tamu.index')
            ->with('success', $val['nama'] . ' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tamu $tamu)
    {
        $tamu->delete();

        return redirect()->route('tamu.index')
            ->with('success', 'Tamu berhasil dihapus');
    }
}
