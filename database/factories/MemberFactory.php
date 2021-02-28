<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MemberFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $postcode = rand(1000, 9999);

        return [
            'email' => $this->faker->email,
            'nip' =>  $this->faker->unique()->numberBetween(1000000, 9999999),
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'title' => $this->faker->title(),
            'address' => $this->faker->address,
            'zip' => $postcode,
            'city' => $this->faker->city,
            'phone' => $this->faker->phoneNumber,
            'mobile' => $this->faker->phoneNumber,
            'work' => $this->faker->phoneNumber,
            'birthdate' => $this->faker->date(),
        ];
    }

}