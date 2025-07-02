<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'tbl_peminjaman';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nim',
        'nomor_wa',
        'deskripsi',
        'jenis',
        'barang_id',
        'tanggal',
        'jam_mulai',
        'jam_berakhir',
    ];

    // Relasi ke User (jika diperlukan)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
