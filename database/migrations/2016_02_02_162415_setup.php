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
        $this->down();
        Schema::create('training', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->timestamps();
            $table->unique('name');
        });

        Schema::create('exam', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('training_id')->unsigned();
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->datetime('completed_at')->nullable();

            $table->timestamps();
            $table->foreign('training_id')->references('id')->on('training');
        });

        Schema::create('attendee', function(Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('company')->nullable();
            $table->timestamps();
        });

        Schema::create('exam_attendee', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_id')->unsigned();
            $table->integer('attendee_id')->unsigned();
            $table->datetime('submitted_at')->nullable();
            $table->string('login', 10);
            $table->timestamps();

            $table->foreign('exam_id')->references('id')->on('exam');
            $table->foreign('attendee_id')->references('id')->on('attendee');
        });

        Schema::create('question', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('training_id')->unsigned();
            $table->text('text');
            $table->text('tags')->nullable();
            $table->timestamps();

            $table->foreign('training_id')->references('id')->on('training');
        });

        Schema::create('answer', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->text('text');
            $table->boolean('isCorrect')->default(false);
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('question');
        });

        Schema::create('exam_attendee_question', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_attendee_id')->unsigned();
            $table->integer('question_id')->unsigned();

            $table->unique(['exam_attendee_id', 'question_id']);

            $table->foreign('exam_attendee_id')->references('id')->on('exam_attendee');
            $table->foreign('question_id')->references('id')->on('question');
        });

        Schema::create('exam_attendee_question_answer', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_attendee_question_id')->unsigned();
            $table->integer('answer_id')->unsigned();

            $table->foreign('exam_attendee_question_id')->references('id')->on('exam_attendee_question');
            $table->foreign('answer_id')->references('id')->on('answer');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_attendee_question_answer');
        Schema::dropIfExists('exam_attendee_question');
        Schema::dropIfExists('answer');
        Schema::dropIfExists('question');
        Schema::dropIfExists('exam_attendee');
        Schema::dropIfExists('attendee');
        Schema::dropIfExists('exam');
        Schema::dropIfExists('training');
    }
}
