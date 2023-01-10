<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Client;
use App\Models\Exercise;
use App\Models\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = Client::factory()->create();
        $personal = Personal::factory()->create();

        Card::factory()
                ->count(3)
                ->create();
    }
}
