<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamansTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_peminjamans', function (Blueprint $table) {
            $table->id();

            // Jika user login, gunakan foreign key ke tabel users
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nama_lengkap');
            $table->string('nim');
            $table->string('nomor_wa');
            $table->text('deskripsi');
            $table->enum('jenis', ['Elektronik', 'Alat Tulis', 'Lainnya']);
            $table->unsignedBigInteger('barang_id');
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_berakhir');
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');

            $table->timestamps();

            // Relasi opsional ke tabel users dan barang
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_peminjamans');
    }
}
