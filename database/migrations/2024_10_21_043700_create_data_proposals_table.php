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
        Schema::create('data_proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('implementation_id')->constrained('data_implementations')->cascadeOnDelete();
            $table->foreignId('timeline_id')->constrained('item_timelines')->cascadeOnDelete();
            $table->foreignId('division_id')->constrained('data_divisions')->cascadeOnDelete();
            $table->foreignId('department_id')->nullable()->constrained('data_departments')->cascadeOnDelete();
            $table->boolean('division_acc');
            $table->boolean('financial_manager_acc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_proposals');
    }
};
