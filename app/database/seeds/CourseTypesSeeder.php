<?php

class CourseTypesSeeder extends Seeder {

    public function run()
    {

        $courseType = new CourseType();
        $courseType->name = '3-Month Coding Bootcamp (Day)';
        $courseType->description = 'Codeup Bootcamp is a 3 month, in-person program that turns non-techies into entry level Web Developers using a unique, instructor-led approach. Find work, or get 1/2 of your tuition returned.';
        $courseType->duration = 12;
        $courseType->save();

        $courseType = new CourseType();
        $courseType->name = '4-Month Coding Bootcamp (Day)';
        $courseType->description = 'Codeup Bootcamp is a 4 to 6 month, in-person program that turns non-techies into entry level Web Developers using a unique, instructor-led approach. Find work, or get 1/2 of your tuition returned.';
        $courseType->duration = 24;
        $courseType->save();

        $courseType = new CourseType();
        $courseType->name = '9-Month Coding Bootcamp (Night)';
        $courseType->description = 'For the night walkers among you.';
        $courseType->duration = 36;
        $courseType->save();

        $courseType = new CourseType();
        $courseType->name = 'Codeup Gap Year';
        $courseType->description = 'CodeYear is a full-time, 12-month course done before or after college. Students become great programmers by building sophisticated games, launching a startup, and working as an intern at a real company.';
        $courseType->duration = 52;
        $courseType->save();
    }
}