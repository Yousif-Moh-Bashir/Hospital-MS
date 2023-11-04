<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['تقويم اسنان','PCR','تحليل دم','تبييض اسنان','كشف استشاري','حشو عصب','كشف عام','اشعه مقطيه']),
            'price' => $this->faker->unique()->numberBetween(500,5000),
            'description' => $this->faker->paragraph(),
        ];
    }
}
