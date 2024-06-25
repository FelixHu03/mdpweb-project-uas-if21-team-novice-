<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
 // rename   
    protected $fillable = ['id_pemesanan', 'id_tamu', 'id_kamar', 'tgl_check_in', 'tgl_check_out', 'total_biaya', 'status_bayar'];
    public $incrementing = false;
    protected $keyType = 'char';
    protected $primaryKey = 'id_pemesanan';
    protected $table = 'pemesanans';

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar', 'id_kamar');
    }

    public function layananTambahan()
    {
        return $this->belongsTo(layananTambahan::class, 'id_layanan', 'id_layanan');
    }
    public function tamu()
    {
        return $this->belongsTo(tamu::class, 'id_tamu', 'id_tamu');
    }
}
