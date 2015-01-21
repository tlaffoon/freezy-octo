<?php

class CourseType extends \BaseModel {

    protected $table = 'course_types';

    protected $hidden = ['name', 'description', 'duration'];

    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'duration' => 'required|integer',
    ];

    public function courses() {
        $this->hasMany('Courses');
    }

}