<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClasificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $clasifications = [
            'Rusak Berat',
            'Rusak Ringan',
            'Baik',
            
        ];

        foreach ($clasifications as $clasification) {
            DB::table('clasifications')->insert([
                'name' => $clasification,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
