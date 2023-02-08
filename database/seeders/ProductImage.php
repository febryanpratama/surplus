<?php

namespace Database\Seeders;

use App\Models\ProductImage as ModelsProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ModelsProductImage::create([
            'product_id' => 1,
            'image_id' => 1
        ]);

        ModelsProductImage::create([
            'product_id' => 2,
            'image_id' => 2
        ]);
    }
}
