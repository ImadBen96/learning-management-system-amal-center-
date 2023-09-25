<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update70UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            // change() tells the Schema builder that we are altering a table
            $table->dropColumn('status');


        });
        Schema::table('users', function (Blueprint $table) {
            // change() tells the Schema builder that we are altering a table
            $table->enum('status', ['is_inactive','is_active','is_pending','graduate']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
