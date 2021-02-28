<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                StatusTableSeeder::class,
                LicensesTableSeeder::class,
                MembersTableSeeder::class,
                MessageTableSeeder::class,
                CourseTypeTableSeeder::class,
                InstructorsTableSeeder::class,
                CoursesTableSeeder::class,
                PaymentsTableSeeder::class,
                LessonsTableSeeder::class,
                LicenseMemberTableSeeder::class,
                LessonLicenseMemberTableSeeder::class,
                //SettingsSeeder::class,
                UsersSeeder::class,
            ]
        );

    }
}
