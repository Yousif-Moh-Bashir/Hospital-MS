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
            'name' => $this->faker->unique()->randomElement(['قسم التخدير','المخ والاعصاب','الجراحة','قسم الطوارئ','الاطفال','النساء والتوليد','العيون','الباطنة','قسم المختبرات الطبية']),
            'describtion' => $this->faker->paragraph,
        ];
    }
}
