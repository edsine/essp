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
        Schema::create('disease_claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id');
            $table->foreignId('employee_id');
            $table->text('nature_of_work');
            $table->text('nature_of_disease');
            $table->text('nature_of_injury');
            $table->date('date_disease_diagnosed');
            $table->integer('exposure_years');
            $table->integer('exposure_months');
            $table->integer('exposure_days');
            $table->date('accident_report_date');
            $table->string('course_of_work');
            $table->integer('employment_years');
            $table->integer('employment_months');
            $table->text('former_employers');
            $table->string('medical_last_name');
            $table->string('medical_first_name');
            $table->string('medical_practice_number');
            $table->string('document')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disease_claims');
    }
};
