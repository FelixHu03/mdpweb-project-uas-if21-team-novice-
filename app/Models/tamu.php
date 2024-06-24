<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tamu extends Model
{
    use HasFactory;
    protected $fillable = ['id_tamu','nama', 'alamat','email', 'no_telepon'];
    public $incrementing = false;
    protected $primaryKey = 'id_tamu';
    protected $table = 'tamus';
}
