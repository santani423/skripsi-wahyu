<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetentuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketentuans', function (Blueprint $table) {
            $table->string('id_ketentuan', 3)->primary();
            $table->string('id_rule', 3);
            $table->string('ketentuan', 20)->notNullable();
            $table->string('operator', 5)->notNullable();
            $table->string('nilai', 20)->notNullable();
            $table->timestamps();

            $table->foreign('id_rule')->references('id_rule')->on('rules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ketentuans', function (Blueprint $table) {
            $table->dropForeign(['id_rule']);
        });
        Schema::dropIfExists('ketentuans');
    }
}