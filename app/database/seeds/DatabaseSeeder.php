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
        $user->first = 'Thomas';
        $user->last = 'Laffoon';
        $user->fullname = 'Thomas J. Laffoon';
        $user->email = 'thomas@codeup.com';
        $user->phone = '(210) 391-7470';
        $user->password = 'password';
        $user->save();

    }
}
