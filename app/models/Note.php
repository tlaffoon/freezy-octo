<?php

class Note extends \BaseModel {

    public function noteable()
    {
        return $this->morphTo();
    }

    public function author()
    {
        return $this->belongsTo('User');
    }
}