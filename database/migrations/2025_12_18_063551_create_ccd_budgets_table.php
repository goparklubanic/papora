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
            $table->string('master_ik')->constrained('ccd_indicators');
            $table->float('t1', 10, 2)->nullable();
            $table->float('t2', 10, 2)->nullable();
            $table->float('t3', 10, 2)->nullable();
            $table->float('t4', 10, 2)->nullable();
            $table->float('t5', 10, 2)->nullable();
            $table->timestamps();
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
