<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin_kecamatan', 'admin_desa'])->after('email');
            $table->unsignedBigInteger('desa_id')->nullable()->after('role');
            $table->string('phone')->nullable()->after('email_verified_at');
            $table->text('address')->nullable()->after('phone');
            $table->boolean('is_active')->default(true)->after('address');
            
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['desa_id']);
            $table->dropColumn(['role', 'desa_id', 'phone', 'address', 'is_active']);
        });
    }
};