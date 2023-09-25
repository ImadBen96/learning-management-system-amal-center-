<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodCastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pod_casts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('podcastName');
            $table->text('podcastUrl');
            $table->integer('podcastOrder');
            $table->unsignedBigInteger('cource_id');
            $table->foreign('cource_id')->references('id')->on('cources');
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
        Schema::dropIfExists('pod_casts');
    }
}
