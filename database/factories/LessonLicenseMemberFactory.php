<?php

namespace Database\Factories;

use App\Models\LessonLicenseMember;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LessonLicenseMemberFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LessonLicenseMember::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lesson_id' => $this->faker->numberBetween(1, 100),
        	'notes' => $this->faker->sentence,
        	'license_member_id' => $this->faker->numberBetween(1, 100),
        ];
    }

}