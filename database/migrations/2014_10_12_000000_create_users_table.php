<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $current_date = Carbon::now();
        $current_year = $current_date->year;
        Schema::create('users', function (Blueprint $table) use ($current_year) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('avatar');
            $table->integer('age');
            $table->enum('family_situation',['single','married','divorced']);
            $table->integer('total_score')->unsigned();
            $table->integer('nbr_child')->unsigned();
            $table->integer('nbr_of_enrolled_course')->unsigned();
            $table->integer('education_years')->default($current_year);
            $table->string('cin');
            $table->string('scolarity_level');
            $table->string('phone')->nullable();
            $table->string('parent_phone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->enum('groups',['TARGA','GUILIZ'])->nullable();
            $table->enum('status',['is_inactive','is_active','is_pending']);
            $table->enum('current_status',['studying','intern','working'])->nullable();
            $table->enum('is_online',[0,1]);
            $table->timestamp('date_of_final_registrations')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
