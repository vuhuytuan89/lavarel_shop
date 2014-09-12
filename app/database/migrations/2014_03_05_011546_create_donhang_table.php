<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonhangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donhang', function(Blueprint $table) {
			$table->increments('id');
			$table->datetime('ngaymua');
			$table->datetime('ngaygiao');
			$table->string('noigiaohang');
			$table->integer('tonggia');
			$table->text('ghichu');
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
		Schema::drop('donhang');
	}

}
