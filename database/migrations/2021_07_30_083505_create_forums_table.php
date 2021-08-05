<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateForumsTable.
 */
class CreateForumsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forums', function(Blueprint $table) {
        	$table->increments('id');
			$table->string('topic',100);
			$table->string('slug',100);
			$table->integer('user_id');
			$table->text('description');
			$table->text('images');
			$table->integer('category_id');
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
		Schema::drop('forums');
	}
}
