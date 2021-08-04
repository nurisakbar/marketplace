<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUserAddressesTable.
 */
class CreateUserAddressesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_addresses', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('lebel', 60);
			$table->text('address');
			$table->string('phone', 16);
			$table->string('name', 60);
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
		Schema::drop('user_addresses');
	}
}
