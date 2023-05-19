<?php

namespace Database\Seeders;

use App\Models\Addresses;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Addresses::factory()->count(100)->create();
    }
}
