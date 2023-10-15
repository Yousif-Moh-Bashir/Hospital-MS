<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'filename' =>  $this->faker->randomElement(['1.jpg', '2.jpg', '3.jpg', '4.jpg','5.jpg', '6.jpg', '7.jpg', '8.jpg','9.jpg', '10.jpg', '11.jpg', '12.jpg']),
            'imageable_id' => Doctor::all()->random()->id,
            'imageable_type' => 'App\Models\Doctor',
        ];
    }
}
