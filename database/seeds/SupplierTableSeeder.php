<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Generator();
        $faker->addProvider(new Faker\Provider\en_GB\Person($faker));
        $faker->addProvider(new Faker\Provider\en_GB\Address($faker));
        $faker->addProvider(new Faker\Provider\PhoneNumber($faker));
        $faker->addProvider(new Faker\Provider\Internet($faker));

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('suppliers')->insert([
                'name' => $faker->name,
                'credit' => rand(0, 9000),
                'prepayment' => rand(0, 9000),
                'country' => $faker->country,
                'email' => $faker->unique()->email,
                'phone' => $faker->unique()->e164PhoneNumber,
            ]);
        }
    }
}
