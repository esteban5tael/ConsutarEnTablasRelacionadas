<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id_type=['DNI','RUC','CE','PASAPORTE','OTHER'];
        $owners = Owner::all();
        foreach ($owners as $owner) {
            $owner->identification()->create([
                'type' => $id_type[array_rand($id_type)],
                'number' => fake()->unique()->randomNumber(8),
            ]);
        }
    }
}
