<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unites = [
            [
                'id' => '1',
                'name' => 'Gl'
            ],
        ];

        Unit::insert($unites);
    }
}
