<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('statuses')) {
            Schema::create('statuses', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                //$table->timestamps();
            });
            //default data
            $arr=[
                ['id'=>1,'name'=>'Новый'],
                ['id'=>2,'name'=>'На рассмотрении'],
                ['id'=>3,'name'=>'Утверждено'],
                ['id'=>4,'name'=>'Отклонено'],
            ];
            DB::table('statuses')->insert($arr);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
