<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kategori_ukt', function (Blueprint $table) {
            if (!Schema::hasColumn('kategori_ukt', 'id_prodi')) {
                $table->integer('id_prodi')
                    ->after('id_kategori_ukt');
            }

            if (!Schema::hasColumn('kategori_ukt', 'jenjang')) {
                $table->string('jenjang', 10)
                    ->nullable()
                    ->after('nominal_ukt');
            }
        });
    }

    public function down(): void
    {
        Schema::table('kategori_ukt', function (Blueprint $table) {
            if (Schema::hasColumn('kategori_ukt', 'id_prodi')) {
                $table->dropColumn('id_prodi');
            }

            if (Schema::hasColumn('kategori_ukt', 'jenjang')) {
                $table->dropColumn('jenjang');
            }
        });
    }
};