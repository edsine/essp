<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentType::insert([
            ['name' => 'ECS REGISTRATION FEE'],
            ['name' => 'CERTIFICATE REQUEST ENTERPRISE COMPANIES'],
            ['name' => 'CERTIFICATE REQUEST ENTERPRISE BUSINESS NAME 	'],
            ['name' => 'ECS PAYMENT'],
        ]);
    }
}
