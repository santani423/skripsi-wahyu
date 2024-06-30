<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('id_kendaraan', 3)->notNullable();
            $table->string('tgl_bunga', 3)->notNullable();
            $table->date('tgl_bayar')->notNullable();
            $table->string('nama', 20)->notNullable();
            $table->string('umur', 3)->notNullable();
            $table->string('Stts_tmpt_tgl', 20)->notNullable();
            $table->string('slik', 8)->notNullable();
            $table->integer('gaji')->notNullable();
            $table->string('stts_kerja', 20)->notNullable();
            $table->string('jns_thn_kndr', 8)->notNullable();
            $table->string('mm_kndr', 20)->notNullable();
            $table->string('jngka_wktu', 10)->notNullable();
            $table->integer('harga')->notNullable();
            $table->integer('byr_bln')->notNullable();
            $table->integer('ttl_byr')->notNullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuans');
    }
}
