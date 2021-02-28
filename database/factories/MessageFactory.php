<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MessageFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'title' => $this->faker->text,
            'member_id' => $this->faker->numberBetween(1, 100),
            'instructor_id' => $this->faker->numberBetween(1, 100),
            'text' => $this->faker->text,
        ];
    }

}
