<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPeminjamanTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_peminjaman', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel users
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('set null');

            // Relasi ke tabel barangs
            $table->foreignId('barang_id')
                  ->nullable()
                  ->constrained('barangs')
                  ->onDelete('set null');

            // Kolom informasi peminjam
            $table->string('nama_lengkap');
            $table->string('nim');
            $table->string('nomor_wa');
            $table->text('deskripsi');

            // Jenis (Elektronik, Dekorasi, Perkakas)
            $table->enum('jenis', ['Elektronik', 'Dekorasi', 'Perkakas']);

            // Waktu peminjaman
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_berakhir');

            // Status default 'pending'
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_peminjaman');
    }
}
