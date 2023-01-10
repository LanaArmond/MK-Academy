<?php

namespace Database\Seeders;

use App\Models\Equipament;
use Illuminate\Database\Seeder;

class EquipamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Equipament::factory()->count(20)->create();
    }
}
