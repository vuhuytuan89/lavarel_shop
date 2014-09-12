<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogfileadminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logfileadmin', function(Blueprint $table) {
			$table->increments('id');
			$table->string('hoatdong');
			$table->string('tenbang');
			$table->integer('id_thanhphan');
			$table->string('ten_thanhphan');
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
		Schema::drop('logfileadmin');
	}

}
