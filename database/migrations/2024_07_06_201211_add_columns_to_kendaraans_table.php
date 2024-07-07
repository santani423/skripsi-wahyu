<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            $table->integer('tahun_kendaraan')->nullable()->after('nilai');
            $table->string('nama_kendaraan', 100)->nullable()->after('tahun_kendaraan');
            $table->string('merek_kendaraan', 100)->nullable()->after('nama_kendaraan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            $table->dropColumn('tahun_kendaraan');
            $table->dropColumn('nama_kendaraan');
            $table->dropColumn('merek_kendaraan');
        });
    }
}
