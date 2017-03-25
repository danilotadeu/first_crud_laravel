<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
    {
            Schema::table('activities', function ($table) {
                $table->string('description',600)->change();
                $table->date('date_end')->nullable()->change();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::table('activities', function ($table) {
                $table->text('description')->change();
                $table->date('date_end')->change();
            });
    }

}
