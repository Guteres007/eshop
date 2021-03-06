<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ParameterSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(DeliverySeeder::class);
        $this->call(PaymentSeeder::class);
    }
}
