<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzeOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizze_option', function (Blueprint $table) {
            $table->unsignedInteger('quizze_id');
            $table->foreign('quizze_id')->references('id')->on('quizzes');
            $table->unsignedInteger('option_id');
            $table->foreign('option_id')->references('id')->on('options');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizze_option');
    }
}
