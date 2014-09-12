<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSanphamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sanpham', function(Blueprint $table) {
			$table->increments('id');
			$table->string('tensp');
			$table->string('donvitinh');
			$table->string('hinhanh');
			$table->text('chitietsp');
			$table->boolean('khuyenmai');
			$table->integer('luotxem');
			$table->integer('id_loai');
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
		Schema::drop('sanpham');
	}

}
