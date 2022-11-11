<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //todo: dz смотреть урок на платформе создавать провайдер,
        // реализовать внутри создание папок и запись файлов и сохранить в бд файл с полныйм путь
        return [
            'title' => ucfirst($this->faker->words(2, true)),
            'brand_id' => Brand::query()->inRandomOrder()->value('id'),
            'thumbnail' => $this->faker->fixturesImage('products', 'images/products'),

//            'thumbnail' => $this->faker->file(
//                base_path('tests/Textures/images/products'),
//                storage_path('app/public/images/products'),
//                false
//
//            ),
            'price' => $this->faker->numberBetween(1000, 100000),
        ];
    }
}
