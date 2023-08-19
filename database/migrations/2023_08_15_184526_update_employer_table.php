<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Employer;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::table('employers', function (Blueprint $table) {
            $table->unsignedInteger('status')->default(0)->change();
        });

        // Update all employers' status to 1
        // Assuming you want to update all employers with a certain status
        $employers = Employer::where('status', 0)->get();

        foreach ($employers as $employer) {
            $employer->update(['status' => 1]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
