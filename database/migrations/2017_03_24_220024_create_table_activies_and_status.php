<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableActiviesAndStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
    {

        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('description',600);
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('status_id');
            $table->boolean('active');
            $table->timestamps();
        });

       Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
        Schema::dropIfExists('status');
    }
}
