<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserNotesPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Schema::create('user_notes', function($table)
		// {
		//     $table->increments('id');
		//     $table->text('note');

		//     $table->integer('user_id')->unsigned();
		//     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

		//     $table->timestamps();
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::dropIfExists('user_notes');
	}

}
