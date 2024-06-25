<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{// rename
    use HasFactory;
    protected $fillable = ['id_kamar','tipe_kamar', 'harga','status', 'url_foto'];
    public $incrementing = false;
    protected $primaryKey = 'id_kamar';
    protected $keyType = 'char';

    protected $table = 'kamars';
    const STATUS_AVAILLABLE = 'Available';
    const STATUS_BOOKED = 'Booked';
    const STATUS_OCCUPIED = 'Occupied';
    const STATUS_UNDER_MAINTENANCE = 'Under Maintenance';

    public static function getStatuses()
    {
        return [
            self::STATUS_AVAILLABLE,
            self::STATUS_BOOKED,
            self::STATUS_OCCUPIED,
            self::STATUS_UNDER_MAINTENANCE,
        ];
    }
}
