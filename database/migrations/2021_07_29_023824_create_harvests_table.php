<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateHarvestsTable.
 */
class CreateHarvestsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('harvests', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title', 50);
            $table->text('description');
            $table->string('slug', 100);
            $table->integer('category_id');
            $table->text('images')->nullable();
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
		Schema::drop('harvests');
	}
}
