<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->timestamp('email_verified_at')->nullable();
                $table->rememberToken();
                $table->timestamps();
            });
        }
        //default data
//        DB::table('users')->insert([
//            'name'=>'Admin',
//            'email'=>'admin@admin.dom',
//            'password'=>bcrypt('123'),
//            'created_at'=>date('Y-m-d H:i:s'),
//            'updated_at'=>date('Y-m-d H:i:s'),
//        ]);
//        DB::table('users')->insert([
//            'name'=>'User',
//            'email'=>'user@user.dom',
//            'password'=>bcrypt('123'),
//            'created_at'=>date('Y-m-d H:i:s'),
//            'updated_at'=>date('Y-m-d H:i:s'),
//        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
}
