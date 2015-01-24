<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = ['email', 'password', 'password_confirmation', 'address', 'street', 'city', 'state', 'zip'];

	/**
	 * The required fields on users.create form submission.
	 *
	 * @var array
	 */
	public static $rules = array(
		'email'					=>  'required|email',
		'password'				=>	'required|alpha_num|between:6,12|confirmed',
		'password_confirmation'	=>	'required|alpha_num|between:6,12'
	);


	/**
	 * The directory for image uploads.
	 *
	 * @var string
	 */
	protected $imgDir = 'img-upload';


	/**
	 * The function to handle image uploads.
	 *
	 * @param  string  $image
	 */
	public function addUploadedImage($image) {
	    $systemPath = public_path() . '/' . $this->imgDir . '/';
	    //$imageName = $this->id . '_' . $image->getClientOriginalName();
	    $imageName = $image->getClientOriginalName();
	    $image->move($systemPath, $imageName);
	    $this->img_path = '/' . $this->imgDir . '/' . $imageName;
	}

	
	/**
	 * The function to format password on user creation.
	 *
	 * @param  string  $value
	 */
	public function setPasswordAttribute($value) {
		$this->attributes['password'] = Hash::make($value);
	}
	

	public function applications() {
		return $this->hasMany('Application');
	}


	public function notes()
	{
	    return $this->morphMany('Note', 'noteable');
	}

	public function notifications()
	{
	    return $this->hasMany('Notification');
	}

	public function newNotification()
	{
	    $notification = new Notification;
	    $notification->user()->associate($this);
	 
	    return $notification;
	}
}
