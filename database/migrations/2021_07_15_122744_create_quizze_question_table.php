<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzeQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizze_question', function (Blueprint $table) {


            $table->unsignedInteger('quizze_id');
            $table->foreign('quizze_id')->references('id')->on('quizzes');

            $table->unsignedInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizze_question');
    }
}
