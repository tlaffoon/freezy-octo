<?php

class Recap extends \BaseModel {

    protected $table = 'recaps';

    public function author()
    {
     return $this->belongsTo('User', 'user_id');
    }

    public function course() {
        return $this->hasOne('Course');
    }
}