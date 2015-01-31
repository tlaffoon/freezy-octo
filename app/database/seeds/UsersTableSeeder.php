<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        // Create admin user manually.
        $admin = [
            'email' => $_ENV['ADMIN_EMAIL'],
            'gender' => $_ENV['ADMIN_GENDER'],
            'first' => $_ENV['ADMIN_FIRSTNAME'],
            'last' => $_ENV['ADMIN_LASTNAME'],
            'fullname' => $_ENV['ADMIN_FULLNAME'],
            'phone' => $_ENV['ADMIN_PHONE'],
            'password' => Hash::make($_ENV['ADMIN_PASS']),
            'street' => '112 E. Pecan',
            'city' => 'San Antonio',
            'state' => 'Texas',
            'zip' => '78205',
            'role' => 'staff',
        ];

        DB::table('users')->insert($admin);

        /* --------------------- */

        $faker = Faker::create();

        // Used for faker to set random gender.
        $gender = ['male', 'female'];

        // Create random users.
        for ($i = 0; $i < 100; $i++)
        {

            $first = $faker->firstName;
            $last = $faker->lastName;

            $user = array(
                'first' => $first,
                'last' => $last,
                'email' => $faker->email,
                'password' => Hash::make($faker->word),
                'fullname' => $first . ' ' . $last,
                'phone' => $faker->phoneNumber ,
                'gender' =>  $gender[array_rand($gender)],
                'street' => '112 E. Pecan',
                'city' => 'San Antonio',
                'state' => 'Texas',
                'zip' => '78205',
                'address' => '112 E. Pecan San Antonio, TX 78205'
            );

          // Insert user into the database.
          DB::table('users')->insert($user);

        }
    }
}
