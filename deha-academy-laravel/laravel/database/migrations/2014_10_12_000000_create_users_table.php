<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();;
            $table->rememberToken();
            $table->timestamps();
            $table->integer('score_id')->nullable();;
            $table->integer('age')->nullable();;
            $table->integer('hours_worked');
            $table->string('technology')->nullable();;
            $table->date('period_first_at');
            $table->date('period_second_at')->nullable();;
            $table->date('expected_to_end')->nullable();;
            $table->string('manager_period_2')->nullable();;
            $table->string('parts_tracking')->nullable();;
            $table->enum('trainning_state',
                [
                    'waiting_for_introductory_training',
                    'wait_for_the_project_review',
                    'wait_for_the_general_interview',
                    'waiting_for_join_team',
                    'waiting_to_consider_being_a_collaborator',
                    'finish'
                ]
            );
            $table->json('learning_state')->nullable();;
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
