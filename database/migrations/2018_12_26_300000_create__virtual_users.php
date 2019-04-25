<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVirtualUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_users', function($table){
			$table->increments('id');
			$table->integer('domain')->unsigned();
			$table->foreign('domain')->references('id')->on('virtual_domains');
			$table->string('email');
			$table->string('password');
		});
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('virtual_users');
    }
}
