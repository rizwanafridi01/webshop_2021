<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'country_create',
            ],
            [
                'id'    => '18',
                'title' => 'country_edit',
            ],
            [
                'id'    => '19',
                'title' => 'country_show',
            ],
            [
                'id'    => '20',
                'title' => 'country_delete',
            ],
            [
                'id'    => '21',
                'title' => 'country_access',
            ],
            [
                'id'    => '22',
                'title' => 'city_create',
            ],
            [
                'id'    => '23',
                'title' => 'city_edit',
            ],
            [
                'id'    => '24',
                'title' => 'city_show',
            ],
            [
                'id'    => '25',
                'title' => 'city_delete',
            ],
            [
                'id'    => '26',
                'title' => 'city_access',
            ],
            [
                'id'    => '27',
                'title' => 'company_create',
            ],
            [
                'id'    => '28',
                'title' => 'company_edit',
            ],
            [
                'id'    => '29',
                'title' => 'company_show',
            ],
            [
                'id'    => '30',
                'title' => 'company_delete',
            ],
            [
                'id'    => '31',
                'title' => 'company_access',
            ],
            [
                'id'    => '32',
                'title' => 'profile_password_edit',
            ],
            [
              'id' => '33',
              'title' => 'state_create',
            ],
            [
                'id' => '34',
                'title' => 'state_edit',
            ],
            [
                'id' => '35',
                'title' => 'state_show',
            ],
            [
                'id' => '36',
                'title' => 'state_delete',
            ],
            [
                'id' => '37',
                'title' => 'state_access',
            ],
            [
                'id' => '38',
                'title' => 'city_create',
            ],
            [
                'id' => '39',
                'title' => 'city_show',
            ],
            [
                'id' => '40',
                'title' => 'city_edit',
            ],
            [
                'id' => '41',
                'title' => 'city_delete',
            ],
            [
                'id' => '42',
                'title' => 'city_access',
            ],
            [
                'id' => '43',
                'title' => 'region_create',
            ],
            [
                'id' => '44',
                'title' => 'region_show',
            ],
            [
                'id' => '45',
                'title' => 'region_edit',
            ],
            [
                'id' => '46',
                'title' => 'region_delete',
            ],
            [
                'id' => '47',
                'title' => 'region_access',
            ],
            [
                'id' => '48',
                'title' => 'bank_create',
            ],
            [
                'id' => '49',
                'title' => 'bank_show',
            ],
            [
                'id' => '50',
                'title' => 'bank_edit',
            ],
            [
                'id' => '51',
                'title' => 'bank_delete',
            ],
            [
                'id' => '52',
                'title' => 'bank_access',
            ],
            [
                'id' => '53',
                'name' => 'product_create'
            ],
            [
                'id' => '54',
                'name' => 'product_show'
            ],
            [
                'id' => '55',
                'name' => 'product_edit'
            ],
            [
                'id' => '56',
                'name' => 'product_delete'
            ],
            [
                'id' => '57',
                'name' => 'product_access'
            ],
            [
                'id' => '58',
                'name' => 'unit_create'
            ],
            [
                'id' => '59',
                'name' => 'unit_show'
            ],
            [
                'id' => '60',
                'name' => 'unit_edit'
            ],
            [
                'id' => '61',
                'name' => 'unit_delete'
            ],

            [
                'id' => '62',
                'name' => 'unit_access'
            ],
            [
                'id' => '63',
                'name' => 'category_create'
            ],
            [
                'id' => '64',
                'name' => 'category_show'
            ],
            [
                'id' => '65',
                'name' => 'category_edit'
            ],
            [
                'id' => '66',
                'name' => 'category_delete'
            ],

            [
                'id' => '67',
                'name' => 'category_access'
            ],
            [
                'id' => '68',
                'name' => 'sub_category_access'
            ],
            [
                'id' => '69',
                'name' => 'sub_category_delete'
            ],
            [
                'id' => '70',
                'name' => 'sub_category_edit'
            ],
            [
                'id' => '71',
                'name' => 'sub_category_create'
            ],
            [
                'id' => '72',
                'name' => 'sub_category_show'
            ],
        ];

        Permission::insert($permissions);
    }
}
