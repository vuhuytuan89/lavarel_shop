<?php

class UsersController extends BaseController{
    
    public  function postCheckUsername(){
        if(Nguoi_dung::checkUsername(Input::get('username'))) return "true";
        else return "false";
    }
    
    
    
       public  function postCheckEmail(){
               if(Nguoi_dung::checkEmail(Input::get('email'))) return "true";
        else return "false";
           
       }

    public function getDangKy(){
          $chungloai= Chung_loai::all();
   $loai=  Loai::all();
        return View::make('users.register')->with('chungloais' , $chungloai)
                                  ->with('loais', $loai);
    }
    
    public function postDangKy(){
        $rules=array(
            "tennd"=>"required|min:6",
            "username"=>"required|min:6",
            "password"=>"required|min:6|confirmed",
            "diachi"=>"required",
            "email"=>"required|email",
            "dienthoai"=>"required|min:10|max:12"
        );
        
        $data=  Input::all();
        if(!Validator::make($data, $rules)->fails()  && Nguoi_dung::checkUsername(Input::get('username')) && Nguoi_dung::checkEmail(Input::get('email'))){
            $user=new Nguoi_dung();
            $user->tennd=  Input::get('tennd');
            $user->taikhoan=  Input::get('username');
            $user->matkhau=  md5(sha1(Input::get('password')));
            $user->diachi=Input::get('diachi');
            $user->email=Input::get('email');
            $user->dienthoai=Input::get('dienthoai');
           if( $user->save()){// neu insert thanh cong
              return Redirect::to('users/dang-ky')->with('success','Đăng ký thành công');
           }else{//neu insert that bai
                return Redirect::to('users/dang-ky')->with('error','Đăng thất bại');
           }
            
        }else{
          echo "nhap khong dung yeu cau";
        }
        
    }
    public function getDangNhap(){
              $chungloai= Chung_loai::all();
   $loai=  Loai::all();
        return View::make('users.login')->with('chungloais' , $chungloai)
                                  ->with('loais', $loai);
    }
    public function postDangNhap(){

 
        if(Nguoi_dung::checkUserLogin(Input::get('username'), md5(sha1(Input::get('password'))))){
            if(Session::get('quyen')==0){
              return Redirect::to('/');
            }  
            elseif (Session::get('quyen')==1) {
                return Redirect::to('admin/');
            }
        }else{
           return Redirect::to('users/dang-nhap');
        }
    }
    
    public function getThoat(){
        Session::clear();
        return Redirect::to("/");
    }
    
    public function getQuenMatkhau(){
         $chungloai= Chung_loai::all();
   $loai=  Loai::all();
        return View::make('users.forgetpass')->with('chungloais' , $chungloai)
                                  ->with('loais', $loai);
    }
    
    public function postQuenMatkhau(){
        if(!Nguoi_dung::checkEmail(Input::get('email'))){
            Nguoi_dung::getPasstemp(Input::get('email'));
            return Redirect::to("users/quen-matkhau");
        }else{
            Session::put('error_mail', "Không tồn tại email này");
            return Redirect::to("users/quen-matkhau");
        }
    }
    
    // Xử lý việc thay đổi mật khẩu khi người dùng check mail
    public function getHoanTat($email,$pass){
        Nguoi_dung::checkHoanTat($email, $pass);
         return Redirect::to("users/quen-matkhau");
    }
    
    public function getChitietSanpham($id){
           $sanphams=  Sanpham::find($id);
        $sanphams->luotxem+=1;
        $sanphams->save();
        $sp=DB::table("giaapdung")->where("id","=",$id)->first();
        $sps=DB::table("giaapdung")->where("id_loai","=",$sp->id_loai)->limit(6)->get();
        $chungloai= Chung_loai::all();
        $loai=  Loai::all();
        
        return View::make("users.productDetail")
                ->with('chungloais' , $chungloai)
                ->with('loais', $loai)
                ->with('sps',$sps)
                ->with('sp',$sp);
    }
    
    public function getLoaiSanpham($name,$id){
        $sps=DB::table("giaapdung")->where("id_loai","=",$id)->paginate(9);
        $chungloai= Chung_loai::all();
        $loai=  Loai::all();
        return View::make("users.products")
                ->with('chungloais' , $chungloai)
                ->with('loais', $loai)
                ->with('sps',$sps)
               ->with('tenloaisp',$name);
    }
    
    public function getThemGiohang($id){
        $sanphams=  Sanpham::find($id);
        $sanphams->luotxem+=1;
        $sanphams->save();
         $sanpham= DB::table('giaapdung')->find($id);
        $temp=array(
          "id_sp"=>$sanpham->id,
          "tensp"=>$sanpham->tensp,
          "quantity"=>1 ,
            "hinhanh"=>$sanpham->hinhanh,
           "gia"=>$sanpham->gia
        );
        $data=  Session::get('giohang');
        if(is_null($data)){
            $data[$sanpham->id]=$temp;
        }
        elseif (isset($data[$sanpham->id])) {
            $data[$sanpham->id]["quantity"]+=1;
        }  else {
            $data[$sanpham->id]=$temp;
        }
        
        Session::put('giohang', $data);

          return Redirect::to("/")->with('success', "Đã thêm sản phẩm vào giỏ hàng. ");
    }
    public function getXemGiohang(){
       if(Session::has('giohang')){
        $chungloai= Chung_loai::all();
        $loai=  Loai::all();
        $vanchuyens=  Vanchuyen::all();
         return View::make("users.carts")
                ->with('chungloais' , $chungloai)
                ->with('loais', $loai)
                ->with('vanchuyens',$vanchuyens);
       }else{
         
         return Redirect::to('/')->with('errorcart',"Vui lòng chọn sản phẩm");
       }
    }
    
    public function postCapnhatGiohang(){
        $data= Input::all();
       $ssData=Session::get('giohang');
$rules=array();
foreach($data as $key=>$value){
    if($key!="id_hinhthuc" && $key!="ghichu"){
        $rules[$key]="required|numeric";
    }
}

        
$valdator=  Validator::make($data, $rules);
       
       if(!$valdator->fails()){
       foreach($ssData as $ss){
           echo $ss['id_sp'];
           $ssData[$ss['id_sp']]['quantity']=$data["soluong{$ss['id_sp']}"];
          
       }
       
      Session::put("giohang",$ssData);
      return Redirect::to('users/xem-giohang');
    }else{
               return Redirect::to('users/xem-giohang')
                       ->with('errorUpdate','Vui lòng nhập số lượng và chỉ được nhập số');
           }
    
           }
    
   public function postDatHang(){
             $data= Input::all();
             $giohang=Session::get('giohang');
             $rules=array();
             //kiem tra hang ton kho
             $error=array();
             foreach($giohang as $v){
                 $kho=DB::table('ton_kho')->where("id",'=',$v['id_sp'])
                                        ->where("soluong",">=",$v['quantity'])
                                            ->count();
                 if($kho==0){
                     $error[$v['id_sp']]="Sản phẩm {$v['tensp']} đã hết hàng.";
                 }
             }
             
             if(empty($error)){
foreach($data as $key=>$value){
    if($key!="id_hinhthuc" && $key!="ghichu"){
        $rules[$key]="required|numeric";
    }
                    }
              $rules['id_hinhthuc']="required|numeric";     
              
    $valdator=  Validator::make($data, $rules);
    
    if(!$valdator->fails() && !empty($data)){
        
      // dung thi them hoa don
        
     // lay tong gia
        $giavanchuyen=  Vanchuyen::find(Input::get('id_hinhthuc'));
        $total=0;
        foreach($giohang as $sp){
            $total+=$sp['gia']*$sp['quantity'];
        }
        $total+=$giavanchuyen->gia;
 
        date_default_timezone_set("Asia/Bangkok");
        $date=new DateTime();
        $donhang=new Donhang();
        $donhang->ngaymua=$date;
        $donhang->noigiaohang=Session::get('diachi');
        $donhang->ghichu=Input::get('ghichu');
        $donhang->id_hinhthuc=Input::get('id_hinhthuc');
        $donhang->tonggia=$total;
        $donhang->id_user=Session::get('id_taikhoan');
        $donhang->save();
        //them chi tiet don hang
        foreach($giohang as $v){
            $sp=new Ban();
            $sp->id_sp=$v['id_sp'];
            $sp->id_dh=$donhang->id;
            $sp->soluong=$v['quantity'];
            $sp->gia=$v['gia'];
            $sp->save();
        }
        Session::forget('giohang');
        return Redirect::to("/")->with("successcart","Đặt hàng thành công");
        
    }else{
        return Redirect::to("/")->with("errorcart","Đặt hàng thất bại. Xin bạn vui lòng thử lại sau");
    }
   }else{
       //khi trong kho khong co hàng
       return Redirect::to("users/xem-giohang")->with("error",$error);
      // print_r($error);
   }
    
    
   }
   
   public function  postTimSanpham(){
                $chungloai= Chung_loai::all();
        $loai=  Loai::all();
       $data=  Input::all();
       if(Input::get('key')==""){
         $searchproduct=DB::table("giaapdung")
                   ->join("loais", "loais.id", "=","giaapdung.id_loai")
                   ->where("loais.id_chungloai","=",  Input::get('id_loai'))->get();
           
            return View::make("users.searchproduct")->with("sps",$searchproduct)
                             ->with('chungloais' , $chungloai)
                             ->with('loais', $loai);                    
       }else{
    
 
           $searchproduct=DB::table("giaapdung")
                                     ->join("loais", "loais.id", "=","giaapdung.id_loai")
                                    ->Where("tensp","like","%{$data['key']}%")
                                    ->where("id_chungloai","=",Input::get('id_loai'))
                                    ->get();
                             return View::make("users.searchproduct")->with("sps",$searchproduct)
              ->with('chungloais' , $chungloai)
                ->with('loais', $loai);                    
     
       }
       
   }
           public function getXoaSanpham($id){
        $data=Session::get('giohang');
        unset($data[$id]);
        if(empty($data)){
            Session::forget('giohang');
            
        }else  Session::put('giohang', $data);
       
         return Redirect::to('users/xem-giohang');
        
    }
    public function getDoiMatkhau(){
        if(Session::has('taikhoan')){
                       $chungloai= Chung_loai::all();
   $loai=  Loai::all();
            return View::make('users.changepass')->with('chungloais' , $chungloai)
                                  ->with('loais', $loai);
            
        }else{
            return Redirect::to('/');
        }
    }
    
    public function postDoiMatkhau(){
        $rules=array(
            "pass"=>"required",
            "password"=>"required|min:6|confirmed"
            );
        $data=  Input::all();
        $validate=  Validator::make($data, $rules);
        if(!$validate->fails()){
            $check=  Nguoi_dung::where("taikhoan",'=',Session::get('taikhoan'))
                                ->where('matkhau', '=', md5(sha1($data['pass'])))->count();
            if($check>0){
               $nguoidung=  Nguoi_dung::where("taikhoan",'=',Session::get('taikhoan'))
                                ->where('matkhau', '=', md5(sha1($data['pass'])))
                                ->first();
               $nguoidung->matkhau=md5(sha1($data['password']));
               $nguoidung->save();
                return Redirect::to("users/doi-matkhau")->with("successPass","Đổi mật khẩu thành công");
            }else{
                 return Redirect::to("users/doi-matkhau")->with("errorPass","Mật khẩu hiện tại không đúng hoặc xác nhận mật khẩu sai.");
            }
        }else{
            return Redirect::to("users/doi-matkhau")->with("errorPass","Mật khẩu hiện tại không đúng hoặc xác nhận mật khẩu sai.");
        }
    }
}
?>
