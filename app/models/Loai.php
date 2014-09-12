<?php

class Loai extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'tenloai' => 'required',
		'id_chungloai' => 'required',
		'id_hang' => 'required'
	);
}
