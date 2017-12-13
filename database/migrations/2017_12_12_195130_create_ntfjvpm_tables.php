<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNtfjvpmTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('name');

            $table->engine = 'InnoDB';
        });

        Schema::create('function', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('name');
        });

        Schema::create('sub-function', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('function_id')->unsigned();
            $table->string('slug');
            $table->string('name');
        });

        Schema::create('area', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('name');
        });

        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('name');
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
