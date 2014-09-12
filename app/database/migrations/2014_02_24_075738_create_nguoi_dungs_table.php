<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNguoiDungsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nguoi_dungs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('tennd');
			$table->string('taikhoan');
			$table->string('matkhau');
			$table->string('diachi');
			$table->string('email');
			$table->string('dienthoai');
			$table->integer('quyen');
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
		Schema::drop('nguoi_dungs');
	}

}
