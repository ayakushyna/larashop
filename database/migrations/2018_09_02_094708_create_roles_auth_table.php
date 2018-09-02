<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\User;

class CreateRolesAuthTable extends Migration
{
    public function up()
    {
        Schema::connection('pgsqlAuth')->create('roles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        Schema::connection('pgsqlAuth')->create('role_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->integer('user_id')->unsigned();
        });


        DB::connection('pgsqlAuth')->table('roles')->insert([
            'name' => 'admin',
            'description' => 'An Admin'
        ]);
        DB::connection('pgsqlAuth')->table('roles')->insert([
            'name' => 'manager',
            'description' => 'A Manager'
        ]);
        DB::connection('pgsqlAuth')->table('roles')->insert([
            'name' => 'storekeeper',
            'description' => 'A Storekeeper'
        ]);

//        DB::connection('pgsqlAuth')->table('role_user')->insert([
//            'role_id' => Role::where('name','admin')->select('id'),
//            'user_id' => User::where('email','admin@example.com')->select('id'),
//        ]);
//
//        DB::connection('pgsqlAuth')->table('role_user')->insert([
//            'role_id' => Role::where('name','manager')->select('id')->first(),
//            'user_id' => User::where('email','manager@example.com')->select('id')->first(),
//        ]);
//
//        DB::connection('pgsqlAuth')->table('role_user')->insert([
//            'role_id' => Role::where('name','storekeeper')->select('id')->first(),
//            'user_id' => User::where('email','storekeepern@example.com')->select('id')->first(),
//        ]);

    }
    public function down()
    {
        Schema::connection('pgsqlAuth')->dropIfExists('users');
        Schema::connection('pgsqlAuth')->dropIfExists('roles');
        Schema::connection('pgsqlAuth')->dropIfExists('role_user');
    }
}
