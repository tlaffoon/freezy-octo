<?php

class Notification extends \BaseModel
{

    protected $table = 'notifications';

    protected $fillable   = ['user_id', 'subject', 'body', 'object_id', 'object_type', 'sent_at'];
 
    public function getDates()
    {
        return ['created_at', 'updated_at', 'sent_at'];
    }
 
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function withSubject($subject)
    {
        $this->subject = $subject;
     
        return $this;
    }
     
    public function withBody($body)
    {
        $this->body = $body;
     
        return $this;
    }
     
    public function withType($type)
    {
        $this->object_type = $type;
     
        return $this;
    }
     
    public function regarding($object)
    {
        if(is_object($object))
        {
            $this->object_id   = $object->id;
            $this->object_type = get_class($object);
        }
     
        return $this;
    }

    public function deliver()
    {
        $this->sent_at = new Carbon;
        $this->save();
     
        return $this;
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', '=', 0);
    }
}