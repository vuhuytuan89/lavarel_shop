<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//***************************ADMIN**********************************
Route::filter("checkUser", function(){
  if(Session::get('quyen')!=1) return Redirect::to("/");
});
Route::group(array("prefix"=>"admin","before"=>"checkUser"), function(){
            Route::get("/", function(){
                $logs=  Logfileadmin::orderBy("created_at","desc")->paginate(15);
                $tonkho=DB::table("ton_kho")->where("soluong", "<=", 0)->paginate(15);
                return View::make('admin.home')
                        ->with('logs', $logs)
                        ->with("tonkho",$tonkho);
            });
            
               Route::get("logfile", function(){
                $logs=  Logfileadmin::orderBy("created_at","desc")->paginate(15);
                return View::make('logfile.logfile')->with('logs', $logs);
            });
        
});

Route::group(array("before"=>"checkUser"), function(){
     Route::controller('dat_hang', 'DondathangController');
   Route::controller('nhap', 'NhapController');
Route::controller('sanpham', 'SanphamController');
Route::controller('gia', 'GiaController');
    Route::resource('hangs', 'HangsController');
    Route::resource('chung_loais', 'Chung_loaisController');
        Route::resource('nguoi_dungs','Nguoi_dungsController');
          Route::resource('loais', 'LoaisController');
          Route::resource('trangthais', 'TrangthaisController');

Route::resource('vanchuyens', 'VanchuyensController');
         
        
        
});

Route::controller('check', 'CheckController');



//*****************************************************************************************************************88



//* Đăng Ký ********************************************************************************************
Route::controller('users', 'UsersController');

/************************************************************************************************/

// User *******************************************************************************************************
Route::get("/", function(){
   $chungloai= Chung_loai::all();
   $loai=  Loai::all();
   $spHightView=DB::table('giaapdung')->orderBy('luotxem','desc')->limit(2)->get();
   $sps=  DB::table('giaapdung')->orderBy('id','desc')->limit(12)->get();
   $allsp= DB::table('giaapdung')->orderBy('id','desc')->paginate(12);
   return View::make('users/home')->with('chungloais' , $chungloai)
                                  ->with('loais', $loai)
                                  ->with('spHightViews',$spHightView)
                                  ->with('sps',$sps)
                                  ->with('allsp',$allsp);
});









