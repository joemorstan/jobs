<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserVacancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vacancy', function(Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('vacancy_id')->unsigned();
            $table->nullableTimestamps();

            $table->primary(['user_id', 'vacancy_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_vacancy');
    }
}
