<?php

class CheckController extends BaseController{
    public function postChungloaisp(){
      if(  Chung_loai::where('tenchungloai','=',  Input::get('tenchungloai'))->count() >0) return "false";
      else return "true";
    }
}
?>
