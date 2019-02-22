<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class AllDatabaseSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('en_ZA');

        // students
        DB::table('students')->truncate();

        $data = [];

        for ($i = 1; $i <= 100; $i++) {

            $data[$i]['name_surname'] = $faker->firstName . ' ' . $faker->lastName;
            $data[$i]['birthday'] = $faker->date();
            $data[$i]['phone_number'] = $faker->unique()->phoneNumber;

        }

        DB::table('students')->insert($data);

        // teachers
        DB::table('teachers')->truncate();

        $data = [];

        for ($i = 1; $i <= 100; $i++) {

            $data[$i]['name_surname'] = $faker->firstName . ' ' . $faker->lastName;
            $data[$i]['birthday'] = $faker->date();
            $data[$i]['phone_number'] = $faker->unique()->phoneNumber;
            $data[$i]['academic_degree'] = $faker->word;

        }

        DB::table('teachers')->insert($data);

        // courses
        DB::table('courses')->truncate();

        $data = [];

        for ($i = 1; $i <= 10; $i++) {

            $data[$i]['title'] = ucfirst($faker->word);
            $data[$i]['teacher_id'] = $faker->numberBetween(1, 100);

        }

        DB::table('courses')->insert($data);

        // rf_students_courses
        DB::table('rf_students_courses')->truncate();

        $data = [];

        for ($i = 1; $i <= 1000; $i++) {

            $data[$i]['student_id'] = $faker->numberBetween(1, 100);
            $data[$i]['course_id'] = $faker->numberBetween(1, 10);

            $temp = DB::table('rf_students_courses')
                ->where('student_id', $data[$i]['student_id'])
                ->where('course_id', $data[$i]['course_id'])
                ->first();

            if (!empty($temp)) continue;

            DB::table('rf_students_courses')->insert($data[$i]);
        }

        // schedule
        DB::table('schedule')->truncate();

        $data = [];

        for ($i = 1; $i <= 50; $i++) {

            $data[$i]['course_id'] = $faker->numberBetween(1, 10);
            $data[$i]['week_day'] = config('week.days')[array_rand(config('week.days'))];
            $data[$i]['start'] = $faker->time();
            $data[$i]['end'] = $faker->time();

            $temp = DB::table('schedule')
                ->where('course_id', $data[$i]['course_id'])
                ->where('week_day', $data[$i]['week_day'])
                ->first();

            if (!empty($temp)) continue;

            DB::table('schedule')->insert($data[$i]);
        }
    }
}
