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
        Schema::create('ccd_budgets', function (Blueprint $table) {
            $table->uuid('budget_hash')->primary();
            $table->string('master_ik');
            $table->foreign('master_ik')->references('master_ik')->on('ccd_indicators');
            $table->decimal('t1', 10, 2)->nullable();
            $table->decimal('t2', 10, 2)->nullable();
            $table->decimal('t3', 10, 2)->nullable();
            $table->decimal('t4', 10, 2)->nullable();
            $table->decimal('t5', 10, 2)->nullable();
            $table->timestamps();
            $table->decimal('ct1', 10, 2)->default(0.00);
            $table->decimal('ct2', 10, 2)->default(0.00);
            $table->decimal('ct3', 10, 2)->default(0.00);
            $table->decimal('ct4', 10, 2)->default(0.00);
            $table->decimal('ct5', 10, 2)->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ccd_budgets');
    }
};
