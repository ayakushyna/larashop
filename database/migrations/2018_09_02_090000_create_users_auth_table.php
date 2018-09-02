<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersAuthTable extends Migration
{
    public function up()
    {
        Schema::connection('pgsqlAuth')->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::connection('pgsqlAuth')->table('users')->insert([
            'name' => 'Admin Name',
            'email' =>  'admin@example.com',
            'password' => bcrypt('secret')
        ]);
        DB::connection('pgsqlAuth')->table('users')->insert([
            'name' => 'Manager Name',
            'email' =>  'manager@example.com',
            'password' => bcrypt('secret')
        ]);
        DB::connection('pgsqlAuth')->table('users')->insert([
            'name' => 'Storekeeper Name',
            'email' =>  'storekeeper@example.com',
            'password' => bcrypt('secret')
        ]);
    }

    public function down()
    {
        Schema::connection('pgsqlAuth')->dropIfExists('users');
    }
}
