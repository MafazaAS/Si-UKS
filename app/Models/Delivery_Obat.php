<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery_Obat extends Model
{
    protected $table = 'delivery_obat';
    protected $primaryKey = 'id_delivery';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'kelas',
        'ruangan',
        'keluhan',
        'status',
        'waktu_request'
    ];
}
