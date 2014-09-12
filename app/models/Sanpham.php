<?php

class Sanpham extends Eloquent{
    public  $table="sanpham";
    
    public static $rules=array(
        "tensp"=>"required",
        "donvitinh"=>"required",
        "hinhanh"=>"required",
        "chitietsp"=>"required",
        "id_loai"=>"required|numeric",
        "khuyenmai"=>"required|numeric"
        
    );
    
       public static $rulesUpdate=array(
        "tensp"=>"required",
        "donvitinh"=>"required",
       
        "chitietsp"=>"required",
        "id_loai"=>"required|numeric",
        "khuyenmai"=>"required|numeric"
        
    );
}
?>
