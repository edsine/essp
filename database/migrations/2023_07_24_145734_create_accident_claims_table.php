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
        Schema::create('accident_claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id');
            $table->foreignId('employee_id');
            $table->date('accident_date');
            $table->string('accident_time');
            $table->string('accident_town');
            $table->date('accident_report_date');
            $table->string('accident_report_time');
            $table->decimal('employee_earning');
            $table->text('employee_task');
            $table->text('nature_of_injury');
            $table->string('course_of_work');
            $table->string('first_aid_given');
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
        Schema::dropIfExists('accident_claims');
    }
};
