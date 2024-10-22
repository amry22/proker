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
        Schema::create('data_implementations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('qualitative');
            $table->string('quantitative');
            $table->string('timeline');
            $table->string('budget');
            $table->string('budget_source');
            $table->foreignId('proker_id')->constrained('data_prokers')->cascadeOnDelete();
            $table->foreignId('division_id')->constrained('data_divisions')->cascadeOnDelete();
            $table->foreignId('department_id')->nullable()->constrained('data_departments')->cascadeOnDelete();
            $table->integer('is_acc')->nullable();
            $table->string('budget_acc')->nullable();
            $table->integer('is_budget_acc')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_implementations');
    }
};
