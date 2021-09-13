<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank = [
            [
                'id' => '1',
                'name' => 'ADCB',
                'branch' => 'Mafraq',
                'address' => 'sanaya 1',
                'contactNumber' => '32222 2 2 22'
            ],
        ];

        Bank::insert($bank);
    }
}
