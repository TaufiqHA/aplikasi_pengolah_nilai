<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mapel;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mapel::create([
            'mapel' => 'Seni Budaya',
        ]);

        Mapel::create([
            'mapel' => 'Matematika',
        ]);

        Mapel::create([
            'mapel' => 'Fisika',
        ]);

        Mapel::create([
            'mapel' => 'Biologi',
        ]);
    }
}
