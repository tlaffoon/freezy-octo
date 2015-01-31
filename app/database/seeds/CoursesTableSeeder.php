<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('courses')->delete();

        $course = new Course();
        $course->status = 'inactive';
        $course->designation = 'Arches';
        $course->start_date = '2014-10-5';
        $course->end_date = '2015-1-13';
        $course->demo_date = '2015-1-14';
        $course->max_students = 30;
        $course->cost = 10000;
        $course->course_type_id = 1;
        $course->save();

        $course = new Course();
        $course->status = 'inactive';
        $course->designation = 'Badlands';
        $course->start_date = '2014-10-5';
        $course->end_date = '2015-1-13';
        $course->demo_date = '2015-1-14';
        $course->max_students = 30;
        $course->cost = 10000;
        $course->course_type_id = 1;
        $course->save();

        $course = new Course();
        $course->status = 'inactive';
        $course->designation = 'Carlsbad';
        $course->start_date = '2014-10-5';
        $course->end_date = '2015-1-13';
        $course->demo_date = '2015-1-14';
        $course->max_students = 15;
        $course->cost = 10000;
        $course->course_type_id = 1;
        $course->save();

        $course = new Course();
        $course->status = 'inactive';
        $course->designation = 'Denali';
        $course->start_date = '2014-10-5';
        $course->end_date = '2015-1-13';
        $course->demo_date = '2015-1-14';
        $course->max_students = 15;
        $course->cost = 10000;
        $course->course_type_id = 1;
        $course->save();

        $course = new Course();
        $course->status = 'inactive';
        $course->designation = 'Everglades';
        $course->start_date = '2014-11-5';
        $course->end_date = '2015-2-15';
        $course->demo_date = '2015-2-15';
        $course->max_students = 15;
        $course->cost = 10000;
        $course->course_type_id = 1;
        $course->save();

        $course = new Course();
        $course->designation = 'Franklin';
        $course->start_date = '2015-2-3';
        $course->end_date = '2015-6-3';
        $course->demo_date = '2015-6-4';
        $course->max_students = 20;
        $course->cost = 15000;
        $course->course_type_id = 1;
        $course->save();

        $course = new Course();
        $course->designation = 'Gandalf';
        $course->start_date = '2015-3-15';
        $course->end_date = '2015-12-15';
        $course->demo_date = '2015-12-16';
        $course->max_students = 20;
        $course->cost = 15000;
        $course->course_type_id = 2;
        $course->save();

        $course = new Course();
        $course->designation = 'Hodor';
        $course->start_date = '2015-9-7';
        $course->end_date = '2016-9-7';
        $course->demo_date = '2016-9-8';
        $course->max_students = 20;
        $course->cost = 22000;
        $course->course_type_id = 3;
        $course->save();
    }
}
