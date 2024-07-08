<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KamarController extends Controller
{
    public function index()
    {
        $kamar =  Kamar::paginate(10);
        
        return view('kamar.index')
        -> with('kamar', $kamar);
    }

    public function create()
    {
        $statuses = Kamar::getStatuses();
        return view('kamar.create')
        ->with('statuses', $statuses);
    }

    public function store(Request $request)
    {
        $val = $request->validate([
            'id_kamar' => 'required|unique:kamars,id_kamar',
            'tipe_kamar' => 'required',
            'harga' => 'required|integer',
            'status' => 'required',
            'url_foto' => 'required|file|mimes:png,jpg|max:5000'
        ]);
        // rename file, misalnya: 2327250059.png
        // ambil ext file
        $ext = $request->url_foto->getClientOriginalExtension(); //untuk ambil extensi png/jpg
        $val['url_foto'] = $request-> tipe_kamar. "." . $ext;
        // upload file bisa pakai move(), storeAs()
        $request->url_foto->move('foto_kamar', $val['url_foto']);
        // foto: folder tujuan public/foto

        Kamar::create($val);

        return redirect()->route('kamar.index')
            ->with('success', $val['id_kamar'] . ' berhasil disimpan');
    }

    public function show()
    {
        $kamar =  Kamar::all();
        return view('kamar.show')->with('kamar', $kamar);
    }

    public function edit(Kamar $kamar)
    {
        $statuses = Kamar::getStatuses();
        return view('kamar.edit')->with([
        'kamar' => $kamar,
        'statuses' => $statuses,
    ]);    }

    public function update(Request $request, Kamar $kamar)
    {
        if ($request->hasFile('url_foto')) {
            // Delete old file
            File::delete('foto_kamar/' . $kamar->url_foto);
    
            // Validate and process file upload
            $val = $request->validate([
                'id_kamar' => 'required|unique:kamars,id_kamar,' . $kamar->id_kamar . ',id_kamar',
                'tipe_kamar' => 'required',
                'harga' => 'required|integer',
                'status' => 'required',
                'url_foto' => 'file|mimes:png,jpg|max:5000'
            ]);
    
            // Rename and move uploaded file
            $ext = $request->url_foto->getClientOriginalExtension();
            $val['url_foto'] = $request->id_kamar . "." . $ext; // Assuming you want to use id_kamar as the filename
            $request->url_foto->move('foto_kamar', $val['url_foto']);
    
        } else {
            // Handle update without file upload
            $val = $request->validate([
                'id_kamar' => 'required|unique:kamars,id_kamar,' . $kamar->id_kamar . ',id_kamar',
                'tipe_kamar' => 'required',
                'harga' => 'required|integer',
                'status' => 'required',
            ]);
        }
    
        $kamar->update($val);
    
        // Redirect back with success message
        return redirect()->route('kamar.index')->with('success', $kamar->id_kamar . ' berhasil diupdate');
    }


    public function destroy(Kamar $kamar)
    {
        File::delete('foto/'.$kamar['url_foto']);
        $kamar->delete();
        return redirect()->route('kamar.index')->with('success', 'Data Berhasil dihapus');
    }
}
