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
	}
}

class UsersTableSeeder extends Seeder {


    public function run()
    {
        DB::table('users')->delete();

        // Create admin user manually.
        $admin = [
            'username' => 'tjl',
            'email' => 'thomas@codeup.com',
            'gender' => 'male',
            // 'address' => '339 Mahogany Chest',
            'firstname' => 'Thomas',
            'lastname' => 'Laffoon',
            'fullname' => 'Thomas J. Laffoon',
            'phone' => '210 391 7470',
            'role' => 'admin',
            'password' => 'password'
        ];

        DB::table('users')->insert($admin);

        /* --------------------- */

        $faker = Faker::create();

        // Used for faker to set random gender.
        $gender = ['male', 'female'];

        // Create random users.
        for ($i = 0; $i < 100; $i++)
        {
          $user = array(
            'username' => $faker->userName,
            'firstname' => $faker->firstName,
            'lastname' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->word,
            'fullname' => $faker->firstName . ' ' . $faker->lastName,
            'phone' => $faker->phoneNumber ,
            'gender' =>  $gender[array_rand($gender)],
            'role' => 'user',
            // 'address' => $faker->address
          );
          
          // Insert user into the database.
          DB::table('users')->insert($user);

        }
    }
}

class CoursesTableSeeder extends Seeder {

    public function run()
    {

        DB::table('courses')->delete();

        $course = new Course();
        $course->name = '4-Month Coding Bootcamp (Day Classes)';
        $course->description = 'A 4-month coding bootcamp.';
        $course->start_date = '2015-2-15';
        $course->end_date = '2014-6-15';
        $course->duration = 16;
        $course->max_students = 20;
        $course->cost = 15000;
        $course->save();

        $course = new Course();
        $course->name = '9-Month Coding Bootcamp (Night Classes) ';
        $course->description = 'A 9-month coding bootcamp, which facilitates working professionals.';
        $course->start_date = '2015-3-15';
        $course->end_date = '2015-12-15';
        $course->duration = 36;
        $course->max_students = 20;
        $course->cost = 15000;
        $course->save();

        $course = new Course();
        $course->name = 'Codeup Gap Year';
        $course->description = 'A year-long program to develop coding professionals.';
        $course->start_date = '2015-9-15';
        $course->end_date = '2016-9-15';
        $course->duration = 50;
        $course->max_students = 20;
        $course->cost = 22000;
        $course->save();
    }
}

class ApplicationsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('applications')->delete();
        
        $faker = Faker::create();

        $employment_status = ['employed','self-employed','student','unemployed'];
        $financing_status = ['full', 'partial', 'none'];

        for ($i=0; $i < 100; $i++) { 
            $application = [
                'course_id' => $faker->numberBetween($min = 1, $max = 3),
                'employment_status' => $employment_status[array_rand($employment_status)],
                'financing_status' => $financing_status[array_rand($financing_status)],
                'referred_by' => $faker->word,
                'bg_info' => implode('\n', $faker->paragraphs($nb = 3)),
                'questions' => implode(' ', $faker->sentences($nb = 3)),
                'user_id' => $faker->numberBetween($min = 2, $max = 100)
            ];

            DB::table('applications')->insert($application);
        }
    }
}
