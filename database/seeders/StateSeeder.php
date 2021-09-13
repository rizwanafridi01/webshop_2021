<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
          [
              'id' => '1',
              'name' => 'Abu dhabi',
              'company_id' => 1,
              'user_id' => 1,
              'country_id' => 1,
          ],
        ];

        State::insert($states);
    }
}
