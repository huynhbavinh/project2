<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name'=>'đồ điện tử']);
        Category::create(['name'=>'điện thoại','parent_id'=>1]);
        Category::create(['name'=>'máy tính bản','parent_id'=>1]);
        Category::create(['name'=>'nội thất']);
        Category::create(['name'=>'Moto']);
        


    }
}
