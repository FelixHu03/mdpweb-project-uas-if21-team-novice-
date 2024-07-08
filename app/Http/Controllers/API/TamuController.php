<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TamuController extends BaseController

{
    public function index()
    {
        $tamu = Tamu::all();
        if ($tamu->isEmpty()) {
            $response['message'] = 'Tidak ada tamus yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Fakultas ditemukan.';
        $response['data'] = $tamu;
        return response()->json($response, Response::HTTP_OK);
        // atau
        // return response()->json($response, 200);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_tamu' => 'required|unique:tamus',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|email|max:255|unique:tamus',
            'no_telepon' => 'required|max:15|unique:tamus'
        ]);

        $tamu = Tamu::create($validate);
        if ($tamu) {
            $response['success'] = true;
            $response['message'] = 'Fakultas berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }
    public function update(Request $request, $id, Tamu $tamu)
    {
        $validate = $request->validate([
            'id_tamu' => 'required|unique:tamus,id_tamu,' . $tamu->id_tamu . ',id_tamu',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:tamus,email,' . $tamu->id_tamu . ',id_tamu',
            'no_telepon' => 'required|string|max:15|unique:tamus,no_telepon,' . $tamu->id_tamu . ',id_tamu'
        ]);

        Tamu::where('id_tamu', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'Fakultas berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }
    public function destroy($id)
    {
        $tamu = Tamu::where('id_tamu', $id);
        if (count($tamu->get())) {
            $tamu->delete();
            $response['success'] = true;
            $response['message'] = 'Fakultas berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Fakultas tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}
