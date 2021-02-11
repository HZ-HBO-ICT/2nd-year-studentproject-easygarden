<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plant;

class PlantDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Plant();
        $data->token = 'abcdefghijklmnopqrstuvwxyz';
        $data->plant = [
            'tomato' => [
                'water' => 0,
                'nutrition' => 394.3494,
                'light' => 1
            ],
            'cucumber' => [
                'water' => 1,
                'nutrition' => 200.23,
                'light' => 0.5
            ],
        ];
        $data->save();
    }
}
