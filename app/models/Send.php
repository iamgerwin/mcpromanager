<?php

class Send extends Eloquent {
	protected $guarded = array();
	protected $table = 'tbl_send';
	public static $rules = array();
	public $timestamps = true;
}