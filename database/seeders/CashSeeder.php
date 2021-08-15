<?php

namespace Database\Seeders;

use App\Models\Cash;
use Illuminate\Database\Seeder;

class CashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cash::factory()->count(20)->create();
    }
}
