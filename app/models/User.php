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
	protected $hidden = array('first', 'last', 'email', 'phone','password');

	public static $rules = array(
	    'first'		=> 'required',
	    'last'		=> 'required',
	    'email'		=> 'required|email',
	    'password'	=> 'required'
	);


	protected $imgDir = 'img-upload';

	public function setPasswordAttribute($value) {
		$this->attributes['password'] = Hash::make($value);
	}

	public function addUploadedImage($image) {
	    $systemPath = public_path() . '/' . $this->imgDir . '/';
	    //$imageName = $this->id . '_' . $image->getClientOriginalName();
	    $imageName = $image->getClientOriginalName();
	    $image->move($systemPath, $imageName);
	    $this->img_path = '/' . $this->imgDir . '/' . $imageName;
	}

}
