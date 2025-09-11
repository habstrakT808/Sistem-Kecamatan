<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Ubah enum action_type untuk menyesuaikan dengan nilai yang digunakan di aplikasi
        Schema::table('riwayat_aset_desas', function (Blueprint $table) {
            // MySQL memerlukan pendekatan khusus untuk mengubah enum
            DB::statement("ALTER TABLE riwayat_aset_desas MODIFY COLUMN action_type ENUM('create', 'update', 'delete', 'created', 'updated', 'deleted') NOT NULL");
        });
    }

    public function down()
    {
        // Kembalikan ke definisi enum sebelumnya
        Schema::table('riwayat_aset_desas', function (Blueprint $table) {
            DB::statement("ALTER TABLE riwayat_aset_desas MODIFY COLUMN action_type ENUM('created', 'updated', 'deleted') NOT NULL");
        });
    }
};