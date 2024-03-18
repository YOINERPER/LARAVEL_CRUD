<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prod_uid' =>$this->faker->unique()->randomNumber(6,true),
            'prod_codigo' => $this->faker->unique()->randomNumber(6,true),
            'prod_nombre' => $this->faker->sentence(1),
            'prod_descripcion' => $this->faker->paragraph(1,true),
            'prod_precio' => $this->faker->numberBetween(100, 1000)/100,
            'prod_categoria' => $this->faker->numberBetween(1, 15),
        ];
    }
}
