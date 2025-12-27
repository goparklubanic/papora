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
        Schema::create('ccd_indicators', function (Blueprint $table) {
            $table->string('master_ik')->primary();
            $table->string('master_id')->constrained('ccd_descs');
            $table->string('ik_id',2);
            $table->text('indikator');
            $table->string('satuan');
            $table->string('baseline')->nullable();
            $table->float('t1', 8, 2)->nullable();
            $table->float('t2', 8, 2)->nullable();
            $table->float('t3', 8, 2)->nullable();
            $table->float('t4', 8, 2)->nullable();
            $table->float('t5', 8, 2)->nullable();
            $table->text('iku_alasan')->nullable();
            $table->text('iku_formulasi')->nullable();
            $table->text('iku_tipehitung')->nullable();
            $table->text('iku_do')->nullable();
            $table->text('iku_sumberdata')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ccd_indicators');
    }
};
