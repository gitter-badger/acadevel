<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class Setup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('maxAttendees');
            $table->timestamps();

            $table->unique('name');
            $table->unique('slug');
        });

        Schema::create('attendees', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('training_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('company');
            $table->timestamps();
        });

        Schema::create('questions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('training_id');
            $table->text('text');
            $table->timestamps();
        });


        Schema::create('answers', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id');
            $table->text('text');
            $table->boolean('isCorrect');
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
        Schema::drop('trainings');
        Schema::drop('attendees');
        Schema::drop('questions');
        Schema::drop('answers');
    }
}
