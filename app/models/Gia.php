<?php

class Gia extends Eloquent{
    public $table="gia";
    
    public static $rules=array(
        "ngay"=>"required|date",
        "gia"=>"required|numeric",
        "id_sanpham"=>"required|numeric"
    );
}
?>
