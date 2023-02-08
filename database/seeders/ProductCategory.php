<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CategoryProduct::create([
            'category_id' => 1,
            'product_id' => 1
        ]);
        CategoryProduct::create([
            'category_id' => 2,
            'product_id' => 2
        ]);
    }
}
