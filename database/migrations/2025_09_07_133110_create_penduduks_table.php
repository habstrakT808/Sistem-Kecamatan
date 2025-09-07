<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id');
            $table->string('nik', 16)->unique();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']);
            $table->enum('status_perkawinan', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->string('pekerjaan');
            $table->enum('pendidikan_terakhir', ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']);
            $table->text('alamat');
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->boolean('memiliki_ktp')->default(false);
            $table->date('tanggal_rekam_ktp')->nullable();
            $table->enum('klasifikasi_usia', ['Balita', 'Anak-anak', 'Remaja', 'Dewasa', 'Lansia']);
            $table->timestamps();
            
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');
            $table->index(['desa_id', 'rt', 'rw']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('penduduks');
    }
};