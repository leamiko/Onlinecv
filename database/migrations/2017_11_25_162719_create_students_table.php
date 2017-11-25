<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->string('firstname', 45);
            $table->string('lastname', 45);
            $table->string('email', 90)->unique();

            $table->string('id_number', 45)->default('');
            $table->date('dob')->nullable();
            $table->string('school', 90)->default('');;
            $table->string('address', 90)->default('');;
            $table->string('town', 90)->default('');;
            $table->string('province', 90)->default('');;
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
        Schema::dropIfExists('students');
    }
}