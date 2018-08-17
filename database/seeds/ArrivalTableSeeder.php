<?php

use Illuminate\Database\Seeder;

class ArrivalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('arrivals')->insert([
                'product_id' => rand(1, 5),
                'supplier_id' => rand(1, 10),
                'storage_id' => rand(1, 2),
                'price_per_tonne' => rand(1000, 4000),
                'tonnes' => rand(1, 10),
                'shipping_cost' => rand(500, 1000),
                'created_at' => $faker->dateTime(),
            ]);
        }
    }
}
