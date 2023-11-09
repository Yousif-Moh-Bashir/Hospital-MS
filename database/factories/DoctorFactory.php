<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'section_id' => Section::all()->random()->id,
            'password' => Hash::make('123456'),, // password
            'phone' => $this->faker->phoneNumber,
            'price' => $this->faker->numberBetween(100,1000),
        ];
    }
}
