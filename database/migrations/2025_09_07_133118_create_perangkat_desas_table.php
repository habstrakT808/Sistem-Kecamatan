<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('perangkat_desas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id');
            $table->string('nama_lengkap');
            $table->string('jabatan');
            $table->string('nik', 16);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('pendidikan_terakhir');
            $table->text('alamat');
            $table->string('no_telepon')->nullable();
            $table->date('tanggal_mulai_tugas');
            $table->date('tanggal_akhir_tugas')->nullable();
            $table->string('sk_pengangkatan')->nullable();
            $table->text('jobdesk')->nullable();
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif');
            $table->timestamps();
            
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('perangkat_desas');
    }
};