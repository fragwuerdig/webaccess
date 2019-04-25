<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVirtualAliases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_aliases', function($table){
			$table->increments('id');
			$table->integer('domain')->unsigned();
			$table->foreign('domain')->references('id')->on('virtual_domains');
			$table->string('source');
			$table->string('destination');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('virtual_aliases');
    }
}
