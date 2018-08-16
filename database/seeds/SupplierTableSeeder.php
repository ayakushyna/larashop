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
        DB::table('suppliers')->insert([
            'name' => str_random(10),
            'credit' => rand(0,9000),
            'prepayment' => rand(0,9000),
        ]);
    }
}
