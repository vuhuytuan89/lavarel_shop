<?php

class Logfileadmin extends Eloquent{
    public $table="logfileadmin";
    
    public static  function addData($hd,$tenbang,$id,$ten_thanhphan,$input=null){
         date_default_timezone_set("Asia/Bangkok");
        $date=new DateTime();
        if($input==null) {
                      
                        $f=new Logfileadmin();
        
                        $f->hoatdong=$hd;
                        $f->tenbang=$tenbang;
                        $f->id_thanhphan=$id;
                        $f->ten_thanhphan=$ten_thanhphan;
                        $f->datetime=$date->format("Y-m-d H:i:s");
                        $f->save();
        }else{  
                
                 $thongtincu="";
                 $datas=$input[0];
                 foreach($datas as $key=>$value){
                     if($key!="created_at" and $key!="updated_at") $thongtincu.="{$key}:{$value} \n";
                 }
   
                   $f=new Logfileadmin();
                 $f->hoatdong=$hd;
                 $f->tenbang=$tenbang;
                 $f->id_thanhphan=$id;
                 $f->ten_thanhphan=$ten_thanhphan;
                 $f->thongtin_cu=$thongtincu;
                    $f->datetime=$date->format("Y-m-d H:i:s");
                 $f->save();
        }        
    }
}
?>
