<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class layananTambahan extends Model
{
    use HasFactory;

    protected $table = 'layanan_tambahans';
    protected $primaryKey = 'id_layanan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_layanan', 'nama_layanan', 'harga_layanan_tambahan'];
}
