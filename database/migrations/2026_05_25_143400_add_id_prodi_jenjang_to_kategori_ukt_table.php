<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kategori_ukt', function (Blueprint $table) {
            $table->integer('id_prodi')
                ->after('id_kategori_ukt');

            $table->string('jenjang', 10)
                ->nullable()
                ->after('nominal_ukt');
        });
    }

    public function down(): void
    {
        Schema::table('kategori_ukt', function (Blueprint $table) {
            $table->dropColumn([
                'id_prodi',
                'jenjang'
            ]);
        });
    }
};