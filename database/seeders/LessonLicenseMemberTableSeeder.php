<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LessonLicenseMember;

class LessonLicenseMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LessonLicenseMember::factory()
        			->count(100)
        			->create();
    }
}
