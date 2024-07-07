<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            'Ruang Kepala',
            'Ruang Sekretaris',
            'Ruang Bendahara',
            'Ruang Divisi Usaha',
        ];

        foreach ($rooms as $room) {
            DB::table('rooms')->insert([
                'name' => $room,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

       
    }
}
