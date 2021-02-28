<?php

namespace Database\Factories;

use App\Models\LicenseMember;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LicenseMemberFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LicenseMember::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'license_id' => $this->faker->numberBetween(1, 4),
        	'member_id' =>  $this->faker->numberBetween(1, 1000),
        	'valid_from' => $this->faker->date()
        ];
    }

}