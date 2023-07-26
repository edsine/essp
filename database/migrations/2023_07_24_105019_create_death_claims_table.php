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
        Schema::create('death_claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id');
            $table->foreignId('employee_id');
            $table->decimal('last_salary');
            $table->decimal('monthly_contribution');
            $table->text('incident_description');
            $table->date('incident_date');
            $table->string('incident_time');
            $table->string('employer_account_name');
            $table->string('employer_account_number');
            $table->string('employer_bank_name');
            $table->string('employer_sort_code');
            $table->string('employee_account_name');
            $table->string('employee_account_number');
            $table->string('employee_bank_name');
            $table->string('employee_sort_code');
            $table->boolean('status')->default(0);
            $table->string('document')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('death_claims');
    }
};
