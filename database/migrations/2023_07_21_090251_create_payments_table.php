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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id');
            $table->tinyInteger('payment_type');
            $table->integer('employees')->nullable();
            $table->string('rrr');
            $table->string('invoice_number');
            $table->dateTime('invoice_generated_at');
            $table->date('invoice_duration');
            $table->tinyInteger('payment_status');
            $table->decimal('amount', 10, 2);
            $table->boolean('approval_status')->default(0);
            $table->dateTime('paid_at')->nullable();
            $table->string('transaction_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
