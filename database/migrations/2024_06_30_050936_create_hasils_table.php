<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasils', function (Blueprint $table) {
            $table->string('id_hasil', 3)->primary();
            $table->string('id_pengajuan', 3)->notNullable();
            $table->date('tgl_acc')->notNullable();
            $table->date('tgl_bayar')->notNullable();
            $table->integer('byr_bulan')->notNullable();
            $table->string('hasil', 8)->notNullable();
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
        Schema::dropIfExists('hasils');
    }
}
