<?php

class Comment extends \BaseModel {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = ['body'];


    public function commentable()
    {
     return $this->morphTo();
    }

    public function author()
    {
     return $this->belongsTo('User', 'user_id');
    }
}