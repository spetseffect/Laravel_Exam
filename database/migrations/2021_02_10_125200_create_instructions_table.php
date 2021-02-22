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
                $table->string('filename', 255);
                $table->bigInteger('status')->default(1);
                $table->bigInteger('author_id')->unsigned();
                $table->foreign('author_id')->references('id')->on('users');
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
        Schema::dropIfExists('instructions');
    }
}
