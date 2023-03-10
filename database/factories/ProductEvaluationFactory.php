<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductEvaluation>
 */
class ProductEvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                "product_id" => Product::all()->random(),
                "evaluations_qnt" => $this->faker->numberBetween(0, 100),
                "total_grade" => $this->faker->randomFloat(2, 0, 600)
        ];
    }
}
