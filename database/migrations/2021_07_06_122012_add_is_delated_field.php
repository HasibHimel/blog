<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsDelatedField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->boolean('is_deleted');
        });

        Schema::table('comments', function (Blueprint $table) {
            //
            $table->boolean('is_deleted');
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
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->dropColumn('is_deleted');
        });

        Schema::table('comments', function (Blueprint $table) {
            //
            $table->dropColumn('is_deleted');
        });
    }
}
