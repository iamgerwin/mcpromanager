<?php

class Unknown extends Eloquent {
    protected $guarded = array();
    protected $table = 'tbl_unknown';
    public static $rules = array();
    public $timestamps = false;
}