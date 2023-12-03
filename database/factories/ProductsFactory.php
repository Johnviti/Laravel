<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    protected $model = Products::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'qtd' => $this->faker->numberBetween(1, 100),
            'description' => $this->faker->paragraph,
            'categoria' => $this->faker->word,
            'image' => $this->faker->imageUrl(),
            'items' => json_encode(['item1', 'item2', 'item3']),
        ];
    }
}

