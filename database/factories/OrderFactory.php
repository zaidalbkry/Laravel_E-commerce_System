<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_number' => Str::upper(Str::random(10)), // رقم طلب عشوائي
            'total_price' => $this->faker->randomFloat(2, 50, 1000), // سعر عشوائي بين 50 و 1000
            'status' => $this->faker->randomElement(['receiving', 'delivering', 'canceled']), // حالة عشوائية
        ];
    }
}
