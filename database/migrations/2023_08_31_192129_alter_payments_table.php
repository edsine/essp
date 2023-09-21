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
        Schema::table('payments', function (Blueprint $table) {
            $table->year('contribution_year')->nullable();
            $table->enum('contribution_period', ['Annually', 'Monthly'])->nullable();
            $table->integer('contribution_months')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('contribution_year')->nullable();
            $table->dropColumn('contribution_period')->nullable();
            $table->dropColumn('contribution_months')->nullable();
        });
    }
};
