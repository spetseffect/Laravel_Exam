<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructions', function (Blueprint $table) {
            $table->bigInteger('device_id')->unsigned();
            $table->foreign('device_id')->references('id')->on('devices');
        });
        //default data
        DB::table('instructions')->insert([
            'name'=>'Тестовая инструкция',
            'description'=>'Описание для тестовой инструкции',
            'filename'=>'1.txt',
            'author_id'=>1,
            'device_id'=>1,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
