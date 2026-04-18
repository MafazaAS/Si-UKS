<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'id_obat';
    public $timestamps = false;

    protected $fillable = [
        'nama_obat',
        'deskripsi',
        'exp_date',
        'lokasi_obat',
        'stok'
    ];
}
