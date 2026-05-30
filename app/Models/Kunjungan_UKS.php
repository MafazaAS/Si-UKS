<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kunjungan_UKS extends Model
{
    protected $table = 'kunjungan_uks';
    protected $primaryKey = 'id_kunjungan';
    public $timestamps = false;

    protected $fillable = [
        'id_pasien',
        'id_user',
        'Nama',
        'Kelas',
        'keluhan',
        'penanganan',
        'jam_masuk',
        'jam_keluar',
        'keterangan'
    ];

    public function pasien() {
    return $this->belongsTo(Pasien::class,'id_pasien');
    }

    public function user() {
        return $this->belongsTo(User::class,'id_user','id_users');
    }
}
