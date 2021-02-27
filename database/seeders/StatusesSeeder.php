<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Schema::hasTable('statuses')) {
            $findStatus = DB::table('statuses')->first();
            if (!$findStatus) {
                DB::table('statuses')->insert([
                    ['name' => 'Новый'],
                    ['name' => 'На рассмотрении'],
                    ['name' => 'Утверждено'],
                    ['name' => 'Отклонено']
                ]);
            }
        }
    }
}
