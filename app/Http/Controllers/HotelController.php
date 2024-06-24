<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\layananTambahan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotelLayanan = DB::select(
            "SELECT layanan_tambahans.nama_layanan, COUNT(*) AS jumlah 
            FROM pegawais 
            JOIN layanan_tambahans ON pegawais.id_layanan = layanan_tambahans.id_layanan
            GROUP BY layanan_tambahans.nama_layanan;"
        );
        $hotelJK = DB::select(
            "SELECT 
                layanan_tambahans.nama_layanan,
                SUM(CASE WHEN jenis_kelamins.jenis_kelamin = 'L' THEN 1 ELSE 0 END) AS Laki_Laki,
                SUM(CASE WHEN jenis_kelamins.jenis_kelamin = 'P' THEN 1 ELSE 0 END) AS Perempuan
            FROM 
                pegawais
            JOIN 
                layanan_tambahans ON pegawais.id_layanan = layanan_tambahans.id_layanan
            JOIN 
                jenis_kelamins ON pegawais.jenis_kelamin = jenis_kelamins.id
            GROUP BY 
                layanan_tambahans.nama_layanan;"
        );
        
        $user = User::all();
        $layanan_tambahan = layananTambahan::all();
        return view('hotel.index')
            ->with('user', $user)
            ->with('hotelLayanan', $hotelLayanan)
            ->with('hotelJK', $hotelJK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
