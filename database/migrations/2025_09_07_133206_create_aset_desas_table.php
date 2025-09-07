<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('aset_desas', function (Blueprint $table) {
            $table->id();
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
            $table->timestamps();
            
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('aset_desas');
    }
};