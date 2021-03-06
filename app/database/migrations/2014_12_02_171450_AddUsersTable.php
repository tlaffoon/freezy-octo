<?php

use Illuminate\Database\Migrations\Migration;

class AddUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Creates the users table
        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first');
            $table->string('last');
            $table->string('fullname');
            $table->string('phone');
            $table->string('gender');
            $table->date('dob');
            $table->integer('age');
            $table->string('img_path');
            
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('address');

            $table->string('role')->default('student');
            $table->string('status')->default('unassigned');
            $table->integer('assigned_course_id')->unsigned();

            $table->boolean('financing')->default(0);
            $table->boolean('application_completed')->default(0);
            $table->boolean('scholarship_recipient')->default(0);

            $table->string('confirmation_code');
            $table->string('remember_token')->nullable();
            $table->boolean('confirmed')->default(false);

            $table->timestamps();
        });

        // Creates password reminders table
        Schema::create('password_reminders', function ($table) {
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('password_reminders');
        Schema::drop('users');
    }
}
