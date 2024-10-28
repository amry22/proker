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
        Schema::create('data_implementation_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('implementation_id')->constrained('data_implementations')->cascadeOnDelete();
            $table->string('timeline');
            $table->foreignId('target_id')->constrained('item_targets')->cascadeOnDelete();
            $table->foreignId('target_list_id')->constrained('item_target_lists')->cascadeOnDelete();
            $table->string('status');
            $table->text('description');
            $table->text('follow_up');
            $table->foreignId('division_id')->constrained('data_divisions')->cascadeOnDelete();
            $table->foreignId('department_id')->nullable()->constrained('data_departments')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_implementation_reports');
    }
};
