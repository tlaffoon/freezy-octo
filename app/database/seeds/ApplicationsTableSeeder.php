<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

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
