<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChitietnhapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chitietnhap', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('soluong');
			$table->integer('dongia');
			$table->integer('id_phieunhap');
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
		Schema::drop('chitietnhap');
	}

}
