<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilesToPengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengajuans', function (Blueprint $table) {
            $table->string('file_ktp')->nullable()->after('sts_pengajuan');
            $table->string('file_npwp')->nullable()->after('file_ktp');
            $table->string('file_kk')->nullable()->after('file_npwp');
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
            $table->dropColumn('file_ktp');
            $table->dropColumn('file_npwp');
            $table->dropColumn('file_kk');
        });
    }
}
