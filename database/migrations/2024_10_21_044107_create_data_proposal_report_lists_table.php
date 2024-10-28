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
        Schema::create('data_proposal_report_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proker_id')->constrained('data_prokers')->cascadeOnDelete();
            $table->foreignId('implementation_id')->constrained('data_implementations')->cascadeOnDelete();
            $table->string('timeline');
            $table->foreignId('proposal_report_id')->constrained('data_proposal_reports')->cascadeOnDelete();
            $table->string('date');
            $table->string('name');
            $table->string('budget');
            $table->integer('file')->nullable();
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
        Schema::dropIfExists('data_proposal_report_lists');
    }
};
