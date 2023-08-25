<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->company(),
            'instructor_id' => $this->faker->numberBetween(1, 15),
            'description' => $this->faker->text(300),
            'summary' => $this->faker->text(300),
            'price' => $this->faker->randomNumber(3),
            'cover_photo' => 'https://picsum.photos/1000/500?random='. rand(1, 100),
            'image' => 'https://i.pravatar.cc/300?u='.$this->faker->uuid()
        ];
    }
}
