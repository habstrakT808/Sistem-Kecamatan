<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id')->nullable();
            $table->string('nama_dokumen');
            $table->text('deskripsi')->nullable();
            $table->enum('kategori', ['legal', 'panduan', 'template', 'laporan']);
            $table->string('file_path');
            $table->string('file_type');
            $table->integer('file_size'); // dalam bytes
            $table->unsignedBigInteger('uploaded_by');
            $table->boolean('is_public')->default(false);
            $table->timestamps();
            
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');
            $table->foreign('uploaded_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokumens');
    }
};