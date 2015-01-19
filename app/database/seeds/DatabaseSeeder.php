<?php

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
        $this->call('CoursesTableSeeder');
        $this->call('ApplicationsTableSeeder');
        // $this->call('NotesTableSeeder');
	}
}
