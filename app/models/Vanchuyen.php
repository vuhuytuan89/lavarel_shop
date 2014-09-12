<?php

class Vanchuyen extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'hinhthuc' => 'required',
		'gia' => 'required'
	);
}
