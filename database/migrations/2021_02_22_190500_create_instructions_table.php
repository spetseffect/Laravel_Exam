<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('instructions')) {
            Schema::create('instructions', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->string('description', 255);
                $table->bigInteger('device_id')->unsigned();
                $table->string('filename', 255);
                $table->bigInteger('author_id')->unsigned();
                $table->bigInteger('status_id')->unsigned()->default(1);
                $table->foreign('device_id')->references('id')->on('devices');
                $table->foreign('author_id')->references('id')->on('users');
                $table->foreign('status_id')->references('id')->on('statuses');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instructions', function (Blueprint $table) {
            $table->dropForeign(['device_id']);
            $table->dropForeign(['author_id']);
            $table->dropForeign(['status_id']);
        });
        Schema::dropIfExists('instructions');
    }
}
