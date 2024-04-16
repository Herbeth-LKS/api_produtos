<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => 'P' . $this->faker->unique()->numberBetween(1, 999), // Cria um código único para cada produto
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'value' => $this->faker->randomFloat(2, 1, 100),
            'quantity' => 100,
        ];
    }
}
