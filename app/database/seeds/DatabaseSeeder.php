<?php

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
	}

}

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        $user->firstname = 'Thomas';
        $user->lastname = 'Laffoon';
        $user->fullname = 'Thomas J. Laffoon';
        $user->email = 'thomas@codeup.com';
        $user->phone = '2103917470';
        $user->password = 'password';
        $user->save();

    }
}
