<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileSlipGajiAndFileRekeningKorangToPengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengajuans', function (Blueprint $table) {
            $table->string('file_slip_gaji', 255)->nullable()->after('file_kk');
            $table->string('file_rekening_korang', 255)->nullable()->after('file_slip_gaji');
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
            $table->dropColumn('file_slip_gaji');
            $table->dropColumn('file_rekening_korang');
        });
    }
}
