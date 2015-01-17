<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApplicationNotesPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Schema::create('application_notes', function($table)
		// {
		//     $table->increments('id');
		//     $table->text('note');

		//     $table->integer('application_id')->unsigned();
		//     $table->foreign('application_id')
		//     	->references('id')
		//     	->on('applications')
		//     	->onDelete('cascade');

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
		// Schema::dropIfExists('application_notes');
	}

}
