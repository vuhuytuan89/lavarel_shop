<?php

class Trangthai extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'trangthai' => 'required'
	);
}
