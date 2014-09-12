<?php

class Chung_loai extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'tenchungloai' => 'required'
	);
}
