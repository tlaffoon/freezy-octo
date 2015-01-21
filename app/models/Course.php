<?php

class Course extends \BaseModel {

    protected $table = 'courses';

    protected $hidden = ['current_students', 'max_students', 'cost', 'start_date', 'end_date', 'demo_date'];

    public static $rules = [
        'cost' => 'required|integer',
        'max_students' => 'required|integer',
        'start_date' => 'required|date',
        'end_date' => 'required|date'
    ];

    public function type() {
        return $this->belongsTo('CourseType');
    }

    public function applications() {
        return $this->hasMany('Application');
    }

    public function notes()
    {
        return $this->morphMany('Note', 'noteable');
    }

    // public function getDates()
    // {
    //     return ['created_at', 'updated_at', 'start_date', 'end_date', 'demo_date'];
    // }

    // public function setStartDateAttribute($value)
    // {
    //     $this->attributes['start_date'] = Carbon::createFromFormat('d/m/Y', $value);
    // }

}