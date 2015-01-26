<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function($table)
		{

			$table->increments('id');
			// $table->integer('user_id')->unsigned();

			$table->string('subject', 128)->nullable();
			$table->text('body')->nullable();

			$table->integer('object_id')->unsigned();
			$table->string('object_type', 128);

			$table->boolean('is_read')->default(0);
			$table->dateTime('sent_at')->nullable();
			$table->timestamps();

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notifications');
	}

}
