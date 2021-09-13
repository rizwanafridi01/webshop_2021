<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = [
                [
                    'id'    => '1',
                    'name' => 'Shanoo & Co',
                    'representative' => 'Rizu',
                    'phone' => '1234456',
                    'mobile' => '123445688',
                    'address' => '12 street',
                    'postCode' => '12 mm',
                    'description' => '12 edededed dedede',
                    'user_id' => 1,
                    'region_id' => 1,
                ],
                [
                    'id'    => '2',
                    'name' => 'Juuna & Co',
                    'representative' => 'Rizu 2',
                    'phone' => '1234456',
                    'mobile' => '123445688',
                    'address' => '12 street',
                    'postCode' => '12 mm',
                    'description' => '12 edededed dedede',
                    'user_id' => 1,
                    'region_id' => 1,
                ],
            ];
        Company::insert($company);
    }
}
