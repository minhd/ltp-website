<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProjectPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_project', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->integer('project_id')->unsigned()->nullable();
            $table->foreign('project_id')->references('id')
                ->on('projects')->onDelete('cascade');
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
        Schema::drop('user_project');
    }
}
