<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nodes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('notes');
			$table->string('path');
			$table->integer('parent')
				->unsigned()
				->nullable();
			$table->timestamps();

			$table->foreign('parent')
			    ->references('id')
                ->on('nodes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nodes');
	}

}
