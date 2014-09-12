<?php

class Nguoi_dung extends Eloquent {
	protected $guarded = array();
        public $table="nguoi_dungs";
	public static $rules = array(
		'tennd' => 'required|min:6',
		'taikhoan' => 'required|min:6',
		'matkhau' => 'required|min:6',
		'diachi' => 'required',
		'dienthoai' => 'required|numeric',
		'email' => 'required|email'
	);
        
        public static function checkUsername($username){
               
             if(Nguoi_dung::where('taikhoan','=',$username)->count() >0) return FALSE;
             else return TRUE;
        }
        
        
            public static function checkEmail($email){
               
             if(Nguoi_dung::where('email','=',$email)->count() >0) return FALSE;
             else return TRUE;
        }
        
      public static function checkUserLogin($username,$password){
     
         $user= Nguoi_dung::where('taikhoan','=',$username)
                  ->where('matkhau','=',  $password)
                  ->get()->first();
   
         if(!empty($user)){
           
             Session::put('taikhoan', $user->taikhoan);
             Session::put('quyen', $user->quyen);
              Session::put('id_taikhoan', $user->id);
               Session::put('diachi', $user->diachi);
             
    
             return true;
         }else{
               Session::put('errorlogin', "Sai tài khoản hoặc mật khẩu");
             return false;
         }
      }
      
      public static function getPasstemp($email){

          $mk=md5(uniqid(rand(),true));
      
          $mk= substr($mk,0,6);
          $user=  Nguoi_dung::where('email','=',$email)->get()->first();
          $user->matkhau_tam=$mk;
          $user->save();
          $link=asset("users/hoan-tat/{$email}/{$mk}");
          $data=array("link"=>$link,"mk"=>$mk);
          Mail::send('users.email', $data, function($message) use ($email){
              $message->to($email,'Xin chao!')->subject('Email từ Admin Laravel - Lấy lại mật khẩu');
          });
         Session::put('success_pass', 'Vui lòng kiểm tra email để hoàn tất.');
      }
      // Kiem tra email va mat khau tam thoi . Sau đó, update mat khau cu thành mat  khau tam thoi
      public static function checkHoanTat($email,$mk){
          $user=  Nguoi_dung::where('email','=',$email)
                             ->where('matkhau_tam','=',$mk)
                             ->get()->first();
          if(!empty($user)){
              $user->matkhau=md5(sha1($mk));
              $user->matkhau_tam=null;
              $user->save();
              $login=asset('users/dang-nhap');
              Session::put('success_pass', "Lấy mật khẩu thành công.");
              return true;
              
          }else{
               Session::put('error_pass', 'Lấy mật khẩu thất bại');
               return false;
          }
      }
}

