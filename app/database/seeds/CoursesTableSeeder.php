<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder {

    public function run()
    {

        DB::table('courses')->delete();

        $course = new Course();
        $course->name = '4-Month Coding Bootcamp (Day Classes)';
        $course->description = 'A 4-month coding bootcamp.';
        $course->start_date = '2015-2-15';
        $course->end_date = '2014-6-15';
        $course->duration = 16;
        $course->max_students = 25;
        $course->cost = 15000;
        $course->save();

        $course = new Course();
        $course->name = '9-Month Coding Bootcamp (Night Classes) ';
        $course->description = 'A 9-month coding bootcamp, which facilitates working professionals.';
        $course->start_date = '2015-3-15';
        $course->end_date = '2015-12-15';
        $course->duration = 36;
        $course->max_students = 25;
        $course->cost = 15000;
        $course->save();

        $course = new Course();
        $course->name = 'Codeup Gap Year';
        $course->description = 'A year-long program to develop coding professionals.';
        $course->start_date = '2015-9-15';
        $course->end_date = '2016-9-15';
        $course->duration = 50;
        $course->max_students = 25;
        $course->cost = 22000;
        $course->save();
    }
}
