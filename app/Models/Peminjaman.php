<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = [
    'nama_lengkap',
    'nim',
    'jabatan',
    'nomor_whatsapp',
    'deskripsi',
    'jenis',
    'status',
    ];
}
