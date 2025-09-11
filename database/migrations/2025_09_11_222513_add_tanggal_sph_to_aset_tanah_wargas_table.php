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
        Schema::table('aset_tanah_wargas', function (Blueprint $table) {
            $table->date('tanggal_sph')->after('nomor_sph')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aset_tanah_wargas', function (Blueprint $table) {
            $table->dropColumn('tanggal_sph');
        });
    }
};
