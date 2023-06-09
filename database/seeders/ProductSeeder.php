<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('dataseeder.products');

        foreach($products as $product){
            $newProduct = new Product();

            $newProduct->name = $product['name'];
            $newProduct->slug = Str::slug($product['name'],'-');
            $newProduct->brand_id = $product['brand_id'];
            $newProduct->price = $product['price'];
            $newProduct->category_id = $product['category_id'];
            $newProduct->texture_id = $product['texture_id'];
            $newProduct->description = $product['description'];
            $newProduct->image = ProductSeeder::storeimage($product['api_featured_image']);

            $newProduct->save();
        }


    }

    public static function storeimage($img){
        $url = 'https:'.$img;
        $contents = file_get_contents($url);
        $temp_name = substr($url, strrpos($url,'/') + 1);
        $name = substr($temp_name, 0, strrpos($temp_name,'?'));
    }
}
