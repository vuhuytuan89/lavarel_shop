<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGiaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gia', function(Blueprint $table) {
			$table->increments('id');
			$table->date('ngay');
			$table->integer('gia');
			$table->boolean('apdung');
			$table->integer('id_sanpham');
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
		Schema::drop('gia');
	}

}
