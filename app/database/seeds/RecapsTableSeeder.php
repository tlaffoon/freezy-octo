<?php

use Faker\Factory as Faker;

class RecapsTableSeeder extends Seeder {

    public function run ()
    {

        $faker = Faker::create();

        for ($i=0; $i <= 100; $i++) { 
            $recap = new Recap();
            $recap->body = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
            $recap->course_id = $faker->numberBetween($min = 1, $max = 9);
            $recap->user_id = 1;
            $recap->save();
        }
    }
}