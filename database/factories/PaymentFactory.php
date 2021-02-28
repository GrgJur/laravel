<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PaymentFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
	        'member_id' => $this->faker->numberBetween(1, 100),
	        'course_id' => $this->faker->numberBetween(1, 100),
	        'instructor_id' => $this->faker->numberBetween(1, 100),
	        'amount' => $this->faker->randomFloat(2,100,1000),
        ];
    }

}