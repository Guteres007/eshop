<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Delivery())->insert([
            [
                'name' => 'PPL',
                'price' =>  120

            ],
            [
                'name' => 'Čp',
                'price' =>  150
            ],
            [
                'name' => 'Osobně',
                'price' =>  0
            ]
        ]);
    }
}
