<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Payment())->insert([
            [
                'name' => 'Kartou',

            ],
            [
                'name' => 'Hotově',
            ],
            [
                'name' => 'Dobírkou',
            ]
        ]);
    }
}
