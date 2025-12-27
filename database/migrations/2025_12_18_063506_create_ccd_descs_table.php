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
        Schema::create('ccd_descs', function (Blueprint $table) {
            $table->integer('tahun')->default(2025);
            $table->string('master_id')->primary();
            $table->string('tj_id')->default('00');
            $table->string('ss_id')->default('00');
            $table->string('pg_id')->default('00');
            $table->string('kg_id')->default('00');
            $table->string('sk_id')->default('00');
            $table->text('deskripsi_1');
            $table->text('deskripsi_2');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ccd_descs');
    }
};
