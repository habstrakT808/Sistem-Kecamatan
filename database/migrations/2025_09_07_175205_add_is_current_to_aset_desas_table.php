<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('aset_desas', function (Blueprint $table) {
            $table->boolean('is_current')->default(true)->after('keterangan');
            $table->unsignedBigInteger('updated_by')->nullable()->after('is_current');
            $table->text('update_reason')->nullable()->after('updated_by');
            
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('aset_desas', function (Blueprint $table) {
            $table->dropForeign(['updated_by']);
            $table->dropColumn(['is_current', 'updated_by', 'update_reason']);
        });
    }
};