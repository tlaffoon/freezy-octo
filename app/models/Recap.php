<?php

class Recap extends \BaseModel {

    protected $table = 'recaps';

    public function course() {
        return $this->hasOne('Course');
    }
}