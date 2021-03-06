<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{


    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_type_id' => $this->faker->numberBetween(1, 4),
        	'facebook' => Str::random(16),
            'start_at' => $this->faker->date(),
            'school_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}


