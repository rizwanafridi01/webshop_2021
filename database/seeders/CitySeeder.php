<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = [
            [
                'id' => '1',
                'name' => 'Abu dhabi',
                'state_id' => 1,
                'company_id' => 1,
                'user_id' => 1,
            ],
            [
                'id' => '2',
                'name' => 'Dubai',
                'state_id' => 1,
                'company_id' => 1,
                'user_id' => 1,
            ],
        ];

        City::insert($city);
    }
}
