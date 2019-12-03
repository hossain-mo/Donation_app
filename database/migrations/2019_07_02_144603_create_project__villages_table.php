<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_villages', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedinteger('project_id');
            $table->unsignedinteger('village_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('village_id')->references('id')->on('villages');            
            $table->timestamps();
            $table -> unsignedInteger('created_by'); 
            $table -> unsignedInteger('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project__villages');
    }
}
