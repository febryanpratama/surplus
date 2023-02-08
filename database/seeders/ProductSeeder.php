<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::create([
            'name' => 'Salad',
            'description' => 'Product Salad description',
            'enable' => true
        ]);

        Product::create([
            'name' => 'Orange Juice',
            'description' => 'Product Orange Juice description',
            'enable' => true
        ]);
    }
}
