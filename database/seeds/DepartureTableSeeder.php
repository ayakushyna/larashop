<?php

use Illuminate\Database\Seeder;

class DepartureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departures')->insert([
            'product_id' => rand(1,5),
            'buyer_id' => rand(1,10),
            'storage_id' => rand(1,2),
            'price per tonne' => rand(1000,4000),
            'tonnes' => rand(1,10),
            'shipping cost' => rand(500,1000),
        ]);
    }
}
