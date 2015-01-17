<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('courses')->delete();

        $course = new Course();
        $course->status = 'inactive';
        $course->type = '4-Month Coding Bootcamp (Day)';
        $course->designation = 'Denali';
        $course->description = 'Codeup Bootcamp is a 4 to 6 month, in-person program that turns non-techies into entry level Web Developers using a unique, instructor-led approach. Find work, or get 1/2 of your tuition returned.';
        $course->start_date = '2014-10-5';
        $course->end_date = '2015-1-13';
        $course->demo_date = '2015-1-14';
        $course->duration = 16;
        $course->max_students = 25;
        $course->cost = 10000;
        $course->save();

        $course = new Course();
        $course->status = 'inactive';
        $course->type = '4-Month Coding Bootcamp (Day)';
        $course->designation = 'Everglades';
        $course->description = 'Codeup Bootcamp is a 4 to 6 month, in-person program that turns non-techies into entry level Web Developers using a unique, instructor-led approach. Find work, or get 1/2 of your tuition returned.';
        $course->start_date = '2014-11-5';
        $course->end_date = '2015-2-15';
        $course->demo_date = '2015-2-15';
        $course->duration = 16;
        $course->max_students = 25;
        $course->cost = 10000;
        $course->save();

        $course = new Course();
        $course->type = '4-Month Coding Bootcamp (Day)';
        $course->designation = 'Franklin';
        $course->description = 'Codeup Bootcamp is a 4 to 6 month, in-person program that turns non-techies into entry level Web Developers using a unique, instructor-led approach. Find work, or get 1/2 of your tuition returned.';
        $course->start_date = '2015-2-3';
        $course->end_date = '2015-6-3';
        $course->demo_date = '2015-6-4';
        $course->duration = 16;
        $course->max_students = 25;
        $course->cost = 15000;
        $course->save();

        $course = new Course();
        $course->type = '9-Month Coding Bootcamp (Night) ';
        $course->designation = 'Gandolf';
        $course->description = 'A 9-month coding bootcamp, which facilitates working professionals.';
        $course->start_date = '2015-3-15';
        $course->end_date = '2015-12-15';
        $course->demo_date = '2015-12-16';
        $course->duration = 36;
        $course->max_students = 25;
        $course->cost = 15000;
        $course->save();

        $course = new Course();
        $course->type = 'Codeup Gap Year (2015-2016)';
        $course->designation = 'The Trail Into Mordor';
        $course->description = 'CodeYear is a full-time, 12-month course done before or after college. Students become great programmers by building sophisticated games, launching a startup, and working as an intern at a real company.';
        $course->start_date = '2015-9-7';
        $course->end_date = '2016-9-7';
        $course->demo_date = '2016-9-8';
        $course->duration = 50;
        $course->max_students = 25;
        $course->cost = 22000;
        $course->save();
    }
}
