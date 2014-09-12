<?php

class GiaController extends BaseController{
    public function getXemGia($option=null){
       
        if(is_null($option)) $order="sanpham.tensp";
            elseif ($option=="ngay") {
                     $order="gia.ngay";
                   }
                   elseif ($option=="id") {
                    $order="gia.id";
               }        
        
        $gias=DB::table('gia')
                ->select('gia.id','sanpham.tensp','gia.ngay','gia.gia','gia.apdung','gia.id_sanpham')
                ->join('sanpham','sanpham.id','=','gia.id_sanpham')
                ->orderBy($order, 'desc')
                ->paginate(15);
//        
//      foreach($gias as $gia){
//          echo $gia->tensp;
//      }
       return View::make('gia.index')->with('gias', $gias);
    }
    
    public function getApDung($id_gia,$id_sp,$apdung){
        if($apdung==0){//nếu giá chua duoc ap dung thì ÁP DỤNG
            DB::table("gia")->where('id_sanpham','=',$id_sp)
                            ->update(array("apdung"=>0));
            // set gia = 1
            Gia::where('id','=',$id_gia)
                ->where('id_sanpham','=',$id_sp)
               ->update(array("apdung"=>1));     
             //lu logfile
                $info=array(0=>array("apdung"=>"Chưa áp dụng"));
               Logfileadmin::addData("Áp Dụng", "Giá", $id_gia, $id_sp."( ID Sản Phẩm)",$info);
            return Redirect::to('gia/xem-gia')->with('success', "Áp dụng thành công");
        }else{//neu gia dang ap dung thì HỦY ÁP DỤNG
                  Gia::where('id','=',$id_gia)
                ->where('id_sanpham','=',$id_sp)
               ->update(array("apdung"=>0)); 
                   //lu logfile
                $info=array(0=>array("apdung"=>"Đã áp dụng"));
               Logfileadmin::addData("Hủy Áp Dụng", "Giá", $id_gia, $id_sp."( ID Sản Phẩm)",$info);
                    return Redirect::to('gia/xem-gia')->with('success', "Hủy áp dụng thành công");
        }
    }
 
    public function  getThemGia(){
        $sanphams=  Sanpham::all();
        return View::make('gia.create')->with("sanphams", $sanphams);
    }
    
        public function  postThemGia(){
            $input=Input::all();
            $validation=  Validator::make($input, Gia::$rules);
            if($validation->passes()){
                $gia=  new Gia();
                $gia->ngay=Input::get('ngay');
                $gia->gia=Input::get('gia');
                $gia->id_sanpham=Input::get('id_sanpham');
                $gia->save();
                
                
                Logfileadmin::addData("Thêm", "Giá", $gia->id, $gia->id_sanpham."( ID Sản Phẩm)");
                return Redirect::to('gia/xem-gia/id');
            }else{
                   return Redirect::to('gia/them-gia')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
            }
            
        }
        
        public function getXoaGia($id_gia,$id_sanpham){
            $model=Gia::find($id_gia);
            Logfileadmin::addData("Xóa", "Giá", $id_gia, "ID Sản Phẩm: {$id_sanpham}\n Giá:{$model->gia}");
            Gia::where('id','=',$id_gia)
                    ->where('id_sanpham','=',$id_sanpham)
                    ->delete();
            return Redirect::to('gia/xem-gia')->with('success','Xóa thành công');
        }
        
     public function getChitietGia($id_sanpham){
          $gias=DB::table('gia')
                ->select('gia.id','sanpham.tensp','gia.ngay','gia.gia','gia.apdung','gia.id_sanpham')
                ->join('sanpham','sanpham.id','=','gia.id_sanpham')
                ->where('gia.id_sanpham','=',$id_sanpham)
                ->orderBy("gia.ngay", 'desc')->paginate(15);
          $sanpham=  Sanpham::find($id_sanpham);
          return View::make('gia.show')->with('gias',$gias)
                                        ->with('sp', $sanpham);
      
     }
     
     public function getXemGiaad(){
         $gias=DB::table('giaapdung')->paginate(15);
         return View::make('gia.giaapdung')->with('gias', $gias);
     }
}
?>
