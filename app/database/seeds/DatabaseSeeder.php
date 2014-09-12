<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('Nguoi_dungsTableSeeder');
		$this->call('Chung_loaisTableSeeder');
		$this->call('HangsTableSeeder');
		$this->call('LoaisTableSeeder');
		$this->call('SanphamsTableSeeder');
		$this->call('TrangthaisTableSeeder');
		$this->call('VanchuyensTableSeeder');
	}

}