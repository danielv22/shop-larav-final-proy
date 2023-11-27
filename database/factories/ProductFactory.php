<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
//        $ref = DB::select('SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = \'products\' and table_schema = \'bd_ecommerce\'');
//        $ref = $ref[0]->AUTO_INCREMENT++;
//        $ref = str_pad($ref, 3, '0', STR_PAD_LEFT);

        return [
            'reference' => $this->faker->unique()->randomNumber(3),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(255),
            'stock' => $this->faker->randomNumber(2),
            'price' => $this->faker->randomFloat(2, 50000, 3000000),
            'photo_name' => $this->faker->imageUrl(640, 480, 'furniture', true)
        ];
    }
}
