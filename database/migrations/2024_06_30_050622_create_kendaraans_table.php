<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->string('id_kendaraan', 3)->primary();
            $table->string('nama', 20)->notNullable();
            $table->string('username', 4)->notNullable();
            $table->string('password', 8)->notNullable();
            $table->string('no_tlp', 8)->notNullable();
            $table->string('email', 20)->notNullable();
            $table->string('tipe', 20)->notNullable();
            $table->string('tgl_lahir')->notNullable();
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
        Schema::dropIfExists('kendaraans');
    }
}
