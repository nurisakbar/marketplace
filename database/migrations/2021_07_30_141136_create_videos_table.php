<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateVideosTable.
 */
class CreateVideosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('videos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255 );
            $table->string('slug', 255 );
            $table->text('description')->nullable();
            $table->text('file_name')->nullable();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('user_id');
            $table->enum('active',['y','n']);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('videos');
	}
}
