<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->e164PhoneNumber(),
            'password' => $this->faker->md5(),
            'address' => $this->faker->address(),
            'dob' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['male', 'female','other']),
            'profile' => null,
        ];
    }
}
