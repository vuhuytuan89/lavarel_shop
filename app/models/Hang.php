<?php

class Hang extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'tenhang' => 'required',
		'diachi' => 'required',
		'dienthoai' => 'required|min:10|numeric',
		'email' => 'required|email'
	);
}
