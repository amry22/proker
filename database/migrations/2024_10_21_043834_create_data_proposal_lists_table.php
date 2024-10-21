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
        Schema::create('data_proposal_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_proposal_id')->constrained('data_proposals')->cascadeOnDelete();
            $table->string('name');
            $table->integer('budget_plan');
            $table->integer('budget_acc');
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
        Schema::dropIfExists('data_proposal_lists');
    }
};
