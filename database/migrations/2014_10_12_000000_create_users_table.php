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
            $table->enum('role', ['admin', 'user', 'vendor'])->default('user');
            $table->string('name');
            $table->string('slug',255)->charset('utf8')->index();
			$table->string('avatar')->default('assets/images/faces/face1.jpg')->nullable();
            $table->string('email')->unique();
            $table->string('contact')->nullable();
            $table->string('city')->nullable();
            $table->string('dob')->nullable();
            $table->unsignedBigInteger('security_question_id');
            $table->foreign('security_question_id')->references('id')->on('security_questions')->onDelete('cascade');
            $table->string('security_question_answer')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
