<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('riwayat_aset_desas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aset_desa_id');
            $table->unsignedBigInteger('desa_id');
            $table->enum('kategori_aset', ['tanah', 'bangunan', 'inventaris']);
            $table->string('nama_aset');
            $table->text('deskripsi')->nullable();
            $table->decimal('nilai_perolehan', 15, 2)->nullable();
            $table->decimal('nilai_sekarang', 15, 2)->nullable();
            $table->date('tanggal_perolehan');
            $table->enum('kondisi', ['baik', 'rusak_ringan', 'rusak_berat']);
            $table->text('lokasi');
            $table->string('bukti_kepemilikan')->nullable();
            $table->text('keterangan')->nullable();
            $table->enum('action_type', ['created', 'updated', 'deleted']);
            $table->unsignedBigInteger('changed_by');
            $table->text('change_reason')->nullable();
            $table->timestamps();
            
            $table->foreign('aset_desa_id')->references('id')->on('aset_desas')->onDelete('cascade');
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');
            $table->foreign('changed_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_aset_desas');
    }
};