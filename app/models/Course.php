<?php

class Course extends \BaseModel {

    protected $table = 'courses';

    protected $hidden = ['name', 'description', 'duration', 'current_students', 'max_students', 'cost', 'start_date', 'end_date', 'demo_date'];

    public static $rules = [
        'name' => 'required|alpha',
        'description' => 'required|alphanum',
        'cost' => 'required|integer',
        'max_students' => 'required|integer',
        'start_date' => 'required|date',
        'end_date' => 'required|date'
    ];

    public function applications() {
        return $this->hasMany('Application');
    }

    public function setDuration() {
        //$this->duration = $this->start_date && $this->end_date;
    }

    public function notes()
    {
        return $this->morphMany('Note', 'noteable');
    }

    public function getDates()
    {
        return ['created_at', 'updated_at', 'start_date', 'end_date', 'demo_date'];
    }

    // public function setStartDateAttribute($value)
    // {
    //     $this->attributes['start_date'] = Carbon::createFromFormat('d/m/Y', $value);
    // }

}