<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Image::create([
            'name' => 'Default Image',
            'file' => 'default.jpg',
            'enable' => true
        ]);
        Image::create([
            'name' => 'Default Image 2',
            'file' => 'default.jpg',
            'enable' => true
        ]);
    }
}
