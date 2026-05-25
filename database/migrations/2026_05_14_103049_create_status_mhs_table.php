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
      Schema::create('status_mhs', function (Blueprint $table) {
    $table->id('id_status');

    $table->unsignedBigInteger('id_mhs_ukt');

$table->foreign('id_mhs_ukt')
      ->references('id_mhs_ukt')
      ->on('mhs_ukt')
      ->onDelete('cascade');

    $table->enum('status', [
        'BELUM_LUNAS',
        'CICILAN',
        'LUNAS'
    ]);

    $table->text('keterangan')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_mhs');
    }
};
