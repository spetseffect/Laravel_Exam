<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Schema::hasTable('roles')) {
            $findRole = DB::table('roles')
                ->where('name', '=', 'User')
                ->first();
            if (!$findRole) {
                DB::table('roles')->insert([
                    'name' => 'User',
                ]);
            }
            $findRole = DB::table('roles')
                ->where('name', '=', 'Admin')
                ->first();
            if (!$findRole) {
                DB::table('roles')->insert([
                    'name' => 'Admin',
                ]);
            }
        }
    }
}
