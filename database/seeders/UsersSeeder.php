<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Schema::hasTable('users') && Schema::hasTable('roles')) {
            $findUser=DB::table('users')
                ->where('email','=','user@user.dom')
                ->first();
            $findRole=DB::table('roles')
                ->where('name','=','User')
                ->first();
            if(!$findUser && $findRole) {
                DB::table('users')->insert([
                    'name' => 'User',
                    'email' => 'user@user.dom',
                    'role_id'=>$findRole->id,
                    'password' => bcrypt('123'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
            $findUser=DB::table('users')
                ->where('email','=','admin@admin.dom')
                ->first();
            $findRole=DB::table('roles')
                ->where('name','=','Admin')
                ->first();
            if(!$findUser && $findRole) {
                DB::table('users')->insert([
                    'name'=>'Admin',
                    'email'=>'admin@admin.dom',
                    'role_id'=>$findRole->id,
                    'password'=>bcrypt('123'),
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
