<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subCategory = [
            [
                'id' => '1',
                'name' => 'Sub-Ct-1',
                'category_id' => '1',
            ],
        ];

        SubCategory::insert($subCategory);
    }
}
