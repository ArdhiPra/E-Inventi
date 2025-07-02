<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserBarangForeignKeysOnTblPeminjaman extends Migration
{
    public function up()
    {
        Schema::table('tbl_peminjaman', function (Blueprint $table) {
    $table->unsignedBigInteger('user_id')->nullable()->change();
    $table->unsignedBigInteger('barang_id')->nullable()->change();

    $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
    $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('set null');
});
    }

    public function down()
    {
        Schema::table('tbl_peminjaman', function (Blueprint $table) {
            // Drop foreign keys kalau rollback
            $table->dropForeign(['user_id']);
            $table->dropForeign(['barang_id']);
        });
    }
}
