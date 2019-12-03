<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_type_id');
            $table->foreign('user_type_id')->references('id')->on('user_types');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table -> unsignedInteger('created_by')->nullable();
            $table -> unsignedInteger('updated_by')->nullable();
            $table->text('session_id', 65535)->nullable();
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
