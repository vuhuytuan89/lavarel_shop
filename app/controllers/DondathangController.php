<?php

class DondathangController extends BaseController{
    public function getXemdonDathang(){
        
        $donhangs=DB::table('view_don_hang')
                ->get();
          $count=DB::table('view_don_hang')
                ->count();
          return View::make("hoadonxuat.index")->with("count",$count)
                                            ->with("donhangs",$donhangs);
    }
    public function getDonhangDachuyen(){
            $donhangs=DB::table('view_don_hang_da_chuyen')->orderBy("ngaygiao","desc")
                ->get();
          $count=DB::table('view_don_hang_da_chuyen')
                ->count();
          return View::make("hoadonxuat.donhangdachuyen")->with("count",$count)
                                            ->with("donhangs",$donhangs);
    }
    public function getChitietDonhang($id){
        $dh=  Donhang::find($id);
        $dh->xem=1;
        $dh->save();
        $sps=DB::table("ban")
                ->select("ban.id_dh","ban.id_sp","sanpham.tensp","sanpham.hinhanh","ban.soluong","ban.gia")
                ->join("sanpham", "sanpham.id", "=", "ban.id_sp")
                ->where("ban.id_dh", "=", $id)
                ->get();
        $infos=DB::table("donhang")->select("donhang.ngaymua","donhang.id","donhang.id_trangthai","donhang.noigiaohang","donhang.tonggia","donhang.ghichu"
                ,"nguoi_dungs.id as id_nguoidung","nguoi_dungs.taikhoan","nguoi_dungs.dienthoai",
                "nguoi_dungs.email","nguoi_dungs.tennd","vanchuyens.hinhthuc","vanchuyens.gia")
                ->join("nguoi_dungs", "nguoi_dungs.id", "=", "donhang.id_user")
                ->join("vanchuyens", "vanchuyens.id", "=", "donhang.id_hinhthuc")
                ->where("donhang.id","=",$id)->first();
        return View::make("hoadonxuat.chitiethoadon")
                ->with("sps",$sps)
                ->with("info",$infos);
    }
    
    public function getChuyenHang($id){
        $cthd=  Ban::select("ban.id_sp","ban.soluong","sanpham.tensp")->join("sanpham","sanpham.id",'=',"ban.id_sp")->where("id_dh",'=',$id)->get();
        $error=array();
          foreach($cthd as $v){
                 $kho=DB::table('ton_kho')->where("id",'=',$v->id_sp)
                                        ->where("soluong",">=",$v->soluong)
                                            ->count();
                 if($kho==0){
                     $error[$v->id_sp]="Sản phẩm \"{$v->tensp}\" có ID= {$v->id_sp} đã hết hàng hoặc không đủ số lượng.";
                 }
             }
             if(empty($error)){
             
         date_default_timezone_set("Asia/Bangkok");
        $date=new DateTime();
        $dh=  Donhang::find($id);
        $dh->xem=1;
        $dh->ngaygiao=$date;
        $dh->id_trangthai=3;
        $dh->save();
        return Redirect::to("dat_hang/donhang-dachuyen");
             }else{
                  return Redirect::to("dat_hang/xemdon-dathang")->with("error",$error);
             }
    }
}
?>
