<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('beasiswa_mhs', function (Blueprint $table) {

            $table->unsignedBigInteger('id_beasiswa')
                ->after('nim');

            $table->foreign('id_beasiswa')
                ->references('id_beasiswa')
                ->on('beasiswa')
                ->onDelete('cascade');

            $table->dropColumn('nama_beasiswa');
        });
    }

    public function down(): void
    {
        Schema::table('beasiswa_mhs', function (Blueprint $table) {

            $table->string('nama_beasiswa');

            $table->dropForeign(['id_beasiswa']);

            $table->dropColumn('id_beasiswa');
        });
    }
};