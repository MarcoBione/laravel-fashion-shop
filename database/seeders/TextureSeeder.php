<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Texture;
use Illuminate\Support\Str;

class TextureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $textures = config('dataseeder.textures');

        foreach($textures as $texture){
            $newTextures = new Texture();

            $newTextures->name = $texture;
            $newTextures->slug = Str::slug($texture,'-');
            $newTextures->save();
        }
    }
}
