<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('aset_tanah_wargas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id');
            $table->string('nama_pemilik');
            $table->string('nik_pemilik', 16);
            $table->string('nomor_sph')->unique();
            $table->decimal('luas_tanah', 10, 2); // dalam m2
            $table->text('lokasi');
            $table->string('jenis_tanah');
            $table->enum('status_kepemilikan', ['milik_sendiri', 'warisan', 'hibah', 'jual_beli']);
            $table->decimal('nilai_per_meter', 15, 2)->nullable();
            $table->date('tanggal_perolehan');
            $table->string('bukti_kepemilikan')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('aset_tanah_wargas');
    }
};