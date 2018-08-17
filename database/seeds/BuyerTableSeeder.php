<?php

use Illuminate\Database\Seeder;

class BuyerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Generator();
        $faker->addProvider(new Faker\Provider\ru_Ru\Person($faker));
        $faker->addProvider(new Faker\Provider\ru_Ru\Text($faker));
        $faker->addProvider(new Faker\Provider\ru_Ru\Address($faker));
        $faker->addProvider(new Faker\Provider\uk_UA\PhoneNumber($faker));
        $faker->addProvider(new Faker\Provider\Internet($faker));

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('buyers')->insert([
                'name' => $faker->name,
                'credit' => rand(0, 9000),
                'prepayment' => rand(0, 9000),
                'country' =>  $faker->country,
                'email' => $faker->unique()->email,
                'phone' => $faker->unique()->phoneNumber,
            ]);
        }
    }
}
