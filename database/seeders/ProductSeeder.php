<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Clasification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $carbon = new Carbon();

        $rooms = Room::all();
        $clasifications = Clasification::all();

        $products = [
            'Meja',
            'Kursi',
            'Lemari Buku',
            'Rak Sepatu',
            'Rak Helm',
            'Rak',
            'Kipas Dinding',
            'Kipas Angin Portabel',
            'Kipas Angin',
        ];

       

        for ($i = 1; $i <= count($products); $i++) {
            DB::table('products')->insert([
                'room_id' => mt_rand(1, count($rooms)),
                'clasification_id' => mt_rand(1, count($clasifications)),
                'name' => $products[array_rand($products)],
                'quantity' => mt_rand(50, 200),
                'desc' => 'Keterangan barang',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    
    }
}
