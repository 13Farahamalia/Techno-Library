<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori', ['Jurusan TKJ', 'Jurusan RPL', 'Jurusan TEI', 'Jurusan TBSM', 'Jurusan TKRO', 'Novel']);
            $table->string('foto');
            $table->string('judul');
            $table->string('pencipta');
            $table->string('penerbit');
            $table->date('tanggalterbit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
