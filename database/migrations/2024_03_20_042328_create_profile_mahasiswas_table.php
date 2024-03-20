<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profile_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('id_api');
            $table->string('keterangan');
            $table->timestamps();
        });
    }
    // table ini untuk menyimpan data profile 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_mahasiswas');
    }
};
