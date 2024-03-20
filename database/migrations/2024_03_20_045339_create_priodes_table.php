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
        Schema::create('priodes', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('status_semester');
            $table->string('tanggal_awal');
            $table->string('tanggal_akhir');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priodes');
    }
};
