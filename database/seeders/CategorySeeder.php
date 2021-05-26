<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()

    {

        $categories = [
            [
                'name' => 'Batidos y bebidas saludables',
                'slug' => Str::slug('Batidos y bebidas saludables'),
                'icon' => '<i class="fas fa-seedling"></i>'

            ],
            [
                'name' => 'Frutos empacados al vacío',
                'slug' => Str::slug('Frutos empacados al vacío'),
                'icon' => '<i class="fas fa-apple-alt"></i>'

            ],
            [
                'name' => 'Verduras empacadas al vacío',
                'slug' => Str::slug('Verduras empacadas al vacío'),
                'icon' => '<i class="fas fa-carrot"></i>'

            ],
            [
                'name' => 'Zumos y Nectares',
                'slug' => Str::slug('Zumos y Nectares'),
                'icon' => '<i class="far fa-lemon"></i>'

            ],
            [
                'name' => 'Postres derivados de la Piña',
                'slug' => Str::slug('Postres derivados de la Piña'),
                'icon' => '<i class="fas fa-cheese"></i>'

            ],
            ];

                foreach ($categories as $category){

                $category = Category::factory(1)->create($category)->first();

                $brands = Brand::factory(4)->create();

                foreach ($brands as $brand) {
                    $brand->categories()->attach($category->id);
                }

         }
    }
}
