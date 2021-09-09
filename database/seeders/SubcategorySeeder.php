<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            /* Batidos y bebidas saludables */
            [
                'category_id' => 1,
                'name' => 'Batidos',
                'slug' => Str::slug('Batidos'),
                'color' => true
               
            ],
            [
                'category_id' => 1,
                'name' => 'Frutos Verdes',
                'slug' => Str::slug('Frutos Verdes'),
                'color' => true
            ],
            [
                'category_id' => 1,
                'name' => 'Frutos Rojos',
                'slug' => Str::slug('Frutos Rojos'),
            ],

            /* Frutos empacados al vacío */

            [
                'category_id' => 2,
                'name' => 'Frutos Rojos',
                'slug' => Str::slug('Frutos Rojos'),
            ],
            [
                'category_id' => 2,
                'name' => 'Frutos Verdes',
                'slug' => Str::slug('Frutos Verdes'),
                'color' => true,
                'size' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Frutos Combinados',
                'slug' => Str::slug('Frutos Combinados'),
            ],

            /* Verduras empacadas al vacío */

            [
                'category_id' => 3,
                'name' => 'Raíces',
                'slug' => Str::slug('Raíces'),
            ],
            [
                'category_id' => 3,
                'name' => 'Hojas',
                'slug' => Str::slug('Hojas'),
            ],

            /* Zumos y Nectares */

            [
                'category_id' => 3,
                'name' => 'Zumo de Piña',
                'slug' => Str::slug('Zumo de Piña'),
                'color' => true,
                'size' => true
            ],
            [
                'category_id' => 3,
                'name' => 'Nectar de Piña',
                'slug' => Str::slug('Nectar de Piña'),
                'color' => true,
                'size' => true
            ],

             /* Postres derivados de la Piña */

             [
                'category_id' => 3,
                'name' => 'Postres de Piña',
                'slug' => Str::slug('Postres de Piña'),
                'color' => true,
                'size' => true
            ],
            [
                'category_id' => 3,
                'name' => 'Mermeladas',
                'slug' => Str::slug('Mermeladas'),

            ],

        ];

        foreach ($subcategories as $subcategory) {

            Subcategory::create($subcategory);

        }
    }
}
