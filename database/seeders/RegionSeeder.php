<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region = [
            [
                'id' => '1',
                'name' => '11223 street',
                'city_id'=> 1,
                'user_id' =>1,
                'company_id' =>1,
            ]
        ];
        Region::insert($region);
    }
}
