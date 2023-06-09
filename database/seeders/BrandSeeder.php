<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = config('dataseeder.brands');

        foreach($brands as $brand){
            $newBrand = new Brand();

            $newBrand->name = $brand;
            $newBrand->slug = Str::slug($brand,'-');
            $newBrand->save();
        }
    }
}
