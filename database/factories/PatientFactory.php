<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'Date_Birth' => $this->faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'), // outputs something like 17/09/2001,
            'Phone' => $this->faker->phoneNumber,
            'Gender' => $this->faker->numberBetween(1,2),
            'Blood_Group' => $this->faker->randomElement(['O-','O+','A+','A-','B+','B-','AB+','AB-']),
            'Address' => $this->faker->address(),
        ];
    }
}
