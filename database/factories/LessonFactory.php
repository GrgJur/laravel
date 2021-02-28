<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LessonFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $courseId=\App\Models\Course::all()->pluck('id');
        $randId=$this->faker->randomElement($courseId);
        $instructorId=\App\Models\Instructor::all()->pluck('id');
        $availablesLessons=[];
        $numless=\App\Models\Course::find($randId)->type->number_lessons;

        for($i=1;$i<$numless+1;$i++){
            $availablesLessons[]=$i;
        }

        return [
            'course_id' => $randId,
            'date_time' => $this->faker->dateTime()->format('d-m-Y H:i'),
            'number' => $this->faker->randomElement($availablesLessons),
            'instructor_id' => $this->faker->randomElement($instructorId),
            'status_id' => $this->faker->numberBetween(1, 3),
        ];
    }

}
