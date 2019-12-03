<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->Increments('id');
            $table->text('description');
            $table->text('name');
            $table->unsignedinteger('project_category_id');
            $table->unsignedinteger('village_id');
            $table->foreign('project_category_id')->references('id')->on('project_categories');
            $table->foreign('village_id')->references('id')->on('villages');
            $table->bigInteger('cost');
            $table->integer('execution_period');
            $table->text('cause');
            $table->enum('status',['Donation','Execution','Finished']);
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->text('resault')->nullable();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
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
        Schema::dropIfExists('projects');
    }
}
