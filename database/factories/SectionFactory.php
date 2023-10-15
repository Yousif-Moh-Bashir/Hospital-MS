<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['المخ والاعصاب','الجراحة','الاطفال','النساء والتوليد','العيون','الباطنة']),
            'describtion' => $this->faker->paragraph,
        ];
    }
}
