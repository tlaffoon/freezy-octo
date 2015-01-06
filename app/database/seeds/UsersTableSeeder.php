<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        // Create admin user manually.
        $admin = [
            'username' => $_ENV['ADMIN_USER'],
            'email' => $_ENV['ADMIN_EMAIL'],
            'gender' => $_ENV['ADMIN_GENDER'],
            'first' => $_ENV['ADMIN_FIRSTNAME'],
            'last' => $_ENV['ADMIN_LASTNAME'],
            'fullname' => $_ENV['ADMIN_FULLNAME'],
            'phone' => $_ENV['ADMIN_PHONE'],
            'password' => $_ENV['ADMIN_PASS'],
            'street' => '112 E. Pecan',
            'city' => 'San Antonio',
            'state' => 'Texas',
            'zip' => '78205',
            'role' => 'admin',
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
                'first' => $faker->firstName,
                'last' => $faker->lastName,
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
