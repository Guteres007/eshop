<?php

namespace Database\Seeders;

use App\Models\Parameter;
use Illuminate\Database\Seeder;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Parameter())->insert([
            [
                'name' => 'Materiál',
                'value' => 'Dřevo',
            ],
            [
                'name' => 'Materiál',
                'value' => 'Sklo',
            ]
        ]);
    }
}
