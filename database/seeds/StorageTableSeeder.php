<?php

use Illuminate\Database\Seeder;

class StorageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('storages')->insert([
            'name' => 'Storage1'
        ]);
        DB::table('storages')->insert([
            'name' => 'Storage2',
        ]);
    }
}
