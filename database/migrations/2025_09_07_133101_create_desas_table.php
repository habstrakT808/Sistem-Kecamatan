<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('desas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->string('kode_desa')->unique();
            $table->string('kepala_desa');
            $table->string('sk_kepala_desa')->nullable();
            $table->text('alamat');
            $table->string('kode_pos', 10);
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->decimal('luas_wilayah', 10, 2)->nullable();
            $table->text('komoditas_unggulan')->nullable();
            $table->text('kondisi_sosial_ekonomi')->nullable();
            $table->string('monografi_file')->nullable();
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif');
            $table->timestamp('last_updated_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('desas');
    }
};