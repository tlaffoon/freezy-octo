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
	protected $hidden = array('first', 'last', 'email', 'phone','password', 'password_confirm');


	/**
	 * The required fields on users.create form submission.
	 *
	 * @var array
	 */
	public static $rules = array(

		'firstname'			=>	'required|alpha|min:2',
		'lastname'			=>	'required|alpha|min:2',
		'email'				=>	'required|email|unique:users',
		'password'			=>	'required|alpha_num|between:6,12|confirmed',
		'password_confirm'	=>	'required|alpha_num|between:6,12'
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


	/**
	 * The function to format phone number on user creation.
	 *
	 * @param  string  $value
	 */
	public function setPhoneAttribute($value)
	{
		$this->attributes['phone'] = '(' . substr($value, 0 , 3 ) . ')' . '-' . substr($value, 3 , 3 ) . '-' . substr($value, 6 , 4 );
	}


}
