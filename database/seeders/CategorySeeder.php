<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = config('dataseeder.categories');

        foreach($categories as $category){
            $newCategory = new Category();

            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category,'-');
            $newCategory->save();
        }
    }
}
