<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE status_mhs MODIFY status ENUM('AKTIF', 'NONAKTIF') DEFAULT 'NONAKTIF'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE status_mhs MODIFY status ENUM('BELUM_LUNAS', 'CICILAN', 'LUNAS')");
    }
};