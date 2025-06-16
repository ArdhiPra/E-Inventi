<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeJenisToEnumInBarangsTable extends Migration
{
    public function up()
    {
        Schema::table('barangs', function (Blueprint $table) {
            // Drop kolom lama terlebih dahulu
            $table->dropColumn('jenis');
        });

        Schema::table('barangs', function (Blueprint $table) {
            // Tambahkan ulang kolom sebagai enum
            $table->enum('jenis', ['Dekorasi', 'Alat Elektronik', 'Perkakas'])->after('stok');
        });
    }

    public function down()
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropColumn('jenis');
        });

        Schema::table('barangs', function (Blueprint $table) {
            $table->string('jenis')->after('stok');
        });
    }
}