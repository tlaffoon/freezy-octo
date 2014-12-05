<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('users', function($user)
		{
		    $user->increments('id');
		    $user->string('first');
		    $user->string('last');
		    $user->string('fullname');
		    $user->string('email')->unique();
		    $user->string('phone');
		    $user->string('password');
		    $user->string('img_path');
		    $user->string('remember_token', 64);
		    $user->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}

}
