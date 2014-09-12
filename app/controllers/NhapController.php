<?php

class NhapController extends BaseController{
    public function getXemHoadon(){
        $hoadons=  Phieunhap::orderBy('ngaynhap','desc')->paginate(20);
   
        return View::make('nhap.index')->with('hoadons', $hoadons);
    }
    
    public function getThemHoadon(){
       $data=Session::get('sanphams');
        if(is_null($data)){
            
            return Redirect::to('sanpham/xem-sanpham')->with('success', "Vui lòng chọn sản phẩm cho hóa đơn nhập");
        }else{
           return View::make('nhap.create')->with('data', $data);
        }
    }
    
  
    
    public function getThemSanpham($id){
        $sanpham=  Sanpham::find($id);
        $temp=array(
          "id_sp"=>$sanpham->id,
          "tensp"=>$sanpham->tensp,
          "quantity"=>1 ,
           "gia"=>0
        );
        $data=  Session::get('sanphams');
        if(is_null($data)){
            $data[$sanpham->id]=$temp;
        }
        elseif (isset($data[$sanpham->id])) {
            $data[$sanpham->id]["quantity"]+=1;
        }  else {
            $data[$sanpham->id]=$temp;
        }
        
        Session::put('sanphams', $data);

          return Redirect::to('sanpham/xem-sanpham')->with('success', "Đã thêm sản phẩm vào hóa đơn nhập. ");
    }
    
    public function postCapnhatHoadon(){
       $data= Input::all();
       $ssData=Session::get('sanphams');
    
       foreach($ssData as $ss){
           echo $ss['id_sp'];
           $ssData[$ss['id_sp']]['quantity']=$data["soluong{$ss['id_sp']}"];
           $ssData[$ss['id_sp']]['gia']=$data["dongia{$ss['id_sp']}"];
       }
       
      Session::put("sanphams",$ssData);
       
     
      return Redirect::to("nhap/them-hoadon");
    }
    
      public function postThemHoadon(){
        $data=Session::get('sanphams');
        $inputs=  Input::all();

        
        $rules=$inputs;
       
        foreach($rules as $key=>$value ){
           
            $rules[$key]="required|Integer|min:1";
        }
        $rules["ngaynhap"]="required";
      
        $validation=  Validator::make($inputs, $rules);
        if($validation->passes() ) {
        
        $total=0;
        $rules=array();
        foreach($data as $value){
            $total+=$value["gia"]*$value["quantity"];
           
        }
        
        $hoadon=new Phieunhap();
        $hoadon->ngaynhap=Input::get('ngaynhap');
        $hoadon->tonggia=$total;
        $hoadon->save();
        //luu logfile
        Logfileadmin::addData("Thêm", "Hóa dơn nhập", $hoadon->id, "Hóa đơn nhập");
        
        // sau khi them phieu nhap thi them chi tiet phieu nhap
        foreach($data as $v){
        $ctn=new Chitietnhap();    
        $ctn->id_phieunhap=$hoadon->id;
        $ctn->id_sanpham=$v['id_sp'];
        $ctn->dongia=$v['gia'];
        $ctn->soluong=$v['quantity'];
       
        
        $ctn->save();
         //luu logfile
        
         Logfileadmin::addData("Thêm", "Chi tiết hóa đơn nhập",$ctn->id, "ID Hóa đơn nhập:{$hoadon->id}\n ID Sản Phẩm:{$ctn->id_sanpham}\n Giá:{$ctn->dongia}\n Số lượng:{$ctn->soluong} ");
        
        }
        
        //khi cap nhat xong thi xoa Session sanphams
        
        Session::forget('sanphams');
        return Redirect::to('nhap/xem-hoadon')->with('success',"Thêm hóa đơn nhập thành công.");
        
        
        
        
        }else{
                 return Redirect::to('nhap/them-hoadon')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
        }
        
    }
    
    
    public function getChitietHoadon($id){
        $ctns= DB::table("chitietnhap")
                ->select('chitietnhap.id_phieunhap','chitietnhap.soluong','chitietnhap.dongia','chitietnhap.id_sanpham','sanpham.tensp')
                ->join('sanpham', 'sanpham.id','=','chitietnhap.id_sanpham')
                ->where('chitietnhap.id_phieunhap','=',$id)
                ->get();
        
        return View::make('nhap.show')->with('ctns', $ctns);
    }
    
    public function getXoaHoadon($id){
        Logfileadmin::addData("Xóa", "Hóa đơn nhập",$id,"Hóa đơn nhập");
        $ctns=Chitietnhap::where('id_phieunhap','=',$id)->get();
      
        foreach($ctns as $ctn){
              $value="";
            $value="ID Hóa Đơn Nhập:{$ctn->id_phieunhap}\n".
                    "ID Sản phẩm:{$ctn->id_sanpham}\n".
                    "Đơn Giá:{$ctn->dongia}\n".
                     "Số Lượng:{$ctn->soluong}";
             Logfileadmin::addData("Xóa", "Chi tiết hóa đơn nhập",$ctn->id,$value);
        }
        Chitietnhap::where('id_phieunhap','=',$id)->delete();
        Phieunhap::where('id','=',$id)->delete();
        return Redirect::to('nhap/xem-hoadon');
    }
    
    public function getXoaSanpham($id){
        $data=Session::get('sanphams');
        unset($data[$id]);
        if(empty($data)){
            Session::forget('sanphams');
            
        }else  Session::put('sanphams', $data);
       
         return Redirect::to('nhap/them-hoadon');
        
    }
    
    public function getXemTongkho(){
        $khohangs=DB::table("tongkho")->orderBy("soluong","asc")->paginate(15);
        return View::make('khohang.tongkho')->with('khohangs',$khohangs);
    }
    
     public function getXemTonkho(){
        $khohangs=DB::table("ton_kho")
                ->select("ton_kho.id","tongkho.soluong as tongso","ton_kho.soluong","ton_kho.tensp")
                ->join("tongkho", "tongkho.id", '=', "ton_kho.id")
                ->orderBy('ton_kho.soluong','asc')->paginate(15);
        return View::make('khohang.tonkho')->with('khohangs',$khohangs);
    }
}
?>
