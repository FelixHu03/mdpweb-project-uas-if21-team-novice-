<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = ['nama','tempat_lahir','no_telepon', 'alamat','jenis_kelamin',
    'tanggal_lahir', 'kota_id','id_layanan', 'url_foto'];
    public $incrementing = false;

    protected $table = 'pegawais';

    public function kota(){
        return $this-> belongsTo(kota::class, 'kota_id');
    }
    public function layanan(){
        return $this->belongsTo(LayananTambahan::class, "id_layanan", "id_layanan");
    }
    public function jk(){
        return $this-> belongsTo(jenis_kelamin::class, 'jenis_kelamin');
    }
}
