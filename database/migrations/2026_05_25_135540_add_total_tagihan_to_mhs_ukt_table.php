<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mhs_ukt', function (Blueprint $table) {
            $table->decimal('total_tagihan', 12, 2)
                ->default(0)
                ->after('status_pembayaran');
        });
    }

    public function down(): void
    {
        Schema::table('mhs_ukt', function (Blueprint $table) {
            $table->dropColumn('total_tagihan');
        });
    }
};