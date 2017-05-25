<?php

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
        Schema::create('projects', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('project_recordid')->unique();
            $table->string('projectid');
            $table->text('description');
            $table->double('citycost')->unique()->nullable();
            $table->double('noncitycost');
            $table->double('totalcost')->nullable();
            $table->string('managingagency')->nullable();
            $table->string('commitments')->nullable();
            $table->datetime('createtime')->nullable();
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
        Schema::drop('projects');
    }
}
