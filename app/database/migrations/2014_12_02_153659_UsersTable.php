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
		Schema::create('users', function($user)
		{
		    $user->increments('id');

		    $user->string('firstname');
		    $user->string('lastname');
		    $user->string('fullname');
		    
		    $user->string('email')->unique();
		    $user->string('password');

		    $user->string('role');
		    
		    $user->string('phone');
		    $user->string('gender');
		    $user->date('dob');
		    $user->integer('age');

		    $user->string('img_path');

		    $user->boolean('confirmed')->default(0);
		    $user->string('confirmation_code')->nullable();
		    
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
