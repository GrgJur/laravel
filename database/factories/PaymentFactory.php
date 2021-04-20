<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Member;
use App\Models\Course;
use App\Models\Instructor;
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

        $memberId = $this->faker->numberBetween(1, 100);
        $member_school_id = Member::find($memberId);
        $member_school_id = $member_school_id['school_id'];

        do {

            $courseId = $this->faker->numberBetween(1, 100);
            $course_school_id = Course::find($courseId);
            $course_school_id = $course_school_id['school_id'];
        
        } while ($member_school_id != $course_school_id);


        do {
            $instructorId = $this->faker->numberBetween(1, 100);
            $instructor_school_id = Instructor::find($instructorId);
            $instructor_school_id = $instructor_school_id['school_id'];
        } while ($member_school_id != $instructor_school_id);

        return [
            'date' => $this->faker->date(),
	        'member_id' => $memberId,
            'course_id' => $courseId,
	        'instructor_id' => $instructorId,
	        'amount' => $this->faker->randomFloat(2,100,1000),
        ];
    }

}