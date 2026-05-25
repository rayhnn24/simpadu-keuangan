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
     Schema::create('mhs_ukt', function (Blueprint $table) {
    $table->id('id_mhs_ukt');

    $table->string('nim');

    $table->unsignedBigInteger('id_kategori_ukt');

    $table->foreign('id_kategori_ukt')
          ->references('id_kategori_ukt')
          ->on('kategori_ukt')
          ->onDelete('cascade');

    $table->integer('semester');

    $table->string('tahun_akademik');

    $table->enum('status_pembayaran', [
        'BELUM_LUNAS',
        'CICILAN',
        'LUNAS'
    ])->default('BELUM_LUNAS');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mhs_ukts');
    }
};
