<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakePengajuansNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengajuans', function (Blueprint $table) {
            $table->string('id_kendaraan', 3)->nullable()->change();
            $table->string('tgl_bunga', 3)->nullable()->change();
            $table->date('tgl_bayar')->nullable()->change();
            $table->string('nama', 20)->nullable()->change();
            $table->string('umur', 3)->nullable()->change();
            $table->string('Stts_tmpt_tgl', 20)->nullable()->change();
            $table->string('slik', 8)->nullable()->change();
            $table->integer('gaji')->nullable()->change();
            $table->string('stts_kerja', 20)->nullable()->change();
            $table->string('jns_thn_kndr', 8)->nullable()->change();
            $table->string('mm_kndr', 20)->nullable()->change();
            $table->string('jngka_wktu', 10)->nullable()->change();
            $table->integer('harga')->nullable()->change();
            $table->integer('byr_bln')->nullable()->change();
            $table->integer('ttl_byr')->nullable()->change();
            $table->string('sts_pengajuan', 20)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengajuans', function (Blueprint $table) {
            $table->string('id_kendaraan', 3)->nullable(false)->change();
            $table->string('tgl_bunga', 3)->nullable(false)->change();
            $table->date('tgl_bayar')->nullable(false)->change();
            $table->string('nama', 20)->nullable(false)->change();
            $table->string('umur', 3)->nullable(false)->change();
            $table->string('Stts_tmpt_tgl', 20)->nullable(false)->change();
            $table->string('slik', 8)->nullable(false)->change();
            $table->integer('gaji')->nullable(false)->change();
            $table->string('stts_kerja', 20)->nullable(false)->change();
            $table->string('jns_thn_kndr', 8)->nullable(false)->change();
            $table->string('mm_kndr', 20)->nullable(false)->change();
            $table->string('jngka_wktu', 10)->nullable(false)->change();
            $table->integer('harga')->nullable(false)->change();
            $table->integer('byr_bln')->nullable(false)->change();
            $table->integer('ttl_byr')->nullable(false)->change();
            $table->string('sts_pengajuan', 20)->nullable(false)->change();
        });
    }
}
