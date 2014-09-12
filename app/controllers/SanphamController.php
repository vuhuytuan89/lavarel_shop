<?php

class SanphamController extends BaseController{
    public function getXemSanpham(){
        $sp=  Sanpham::orderBy('id','desc')->paginate(15);
        return View::make('sanpham.index')->with('sp',$sp);
    }
    
    public function getThemSanpham(){
        $loais=  Loai::get();
        return View::make('sanpham.create')->with('loais', $loais);
    }
    
     public function postThemSanpham(){
      $input=Input::all();
      $validation=  Validator::make($input, Sanpham::$rules);
      if($validation->passes()){
         $image=Input::file('hinhanh');
         $imageName=$image->getClientOriginalName();
         $nameArray=explode('.', $imageName);
         $imageType= end($nameArray);
         $imageRules=array("jpg","jpeg","png");
         if(in_array($imageType, $imageRules)){ //neu dung thi tien hanh insert vao csdl
             $imageNewName=  uniqid(rand(), true);
             $imageNewName=md5($imageNewName);
             $imageNewName=  substr($imageNewName, 0, 6);
             $imageNewName.=".".$imageType;
             Input::file('hinhanh')->move('uploads', $imageNewName); // upload hinh anh
             
             //sau khi upload thi insert vao csdl
             $sp=new Sanpham();
             $sp->tensp=  Input::get('tensp');
             $sp->donvitinh=Input::get('donvitinh');
             $sp->hinhanh=$imageNewName;
             $sp->chitietsp=Input::get('chitietsp');
             $sp->khuyenmai=Input::get('khuyenmai');
             $sp->id_loai=Input::get('id_loai');
             $sp->save();
             // luu logfile
            Logfileadmin::addData("Thêm", "Sản Phẩm", $sp->id, $sp->tensp);
             return Redirect::to('sanpham/xem-sanpham');
             
         }else{
             return Redirect::to('sanpham/them-sanpham')
                     ->with('errorImage', "Không đúng định dạng hình ảnh");
         }
         
      }else{
      
      return Redirect::to('sanpham/them-sanpham')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
      }
      
     }
     
     public function getXoaSanpham($id){
         $gia=  Gia::where('id_sanpham','=',$id)->count();
         $ctn=  Chitietnhap::where('id_sanpham','=',$id)->count();
         
   
         if($gia==0 &&   $ctn==0 ){
         $model= Sanpham::find($id);
         Logfileadmin::addData("Xóa", "Sản Phẩm", $model->id, $model->tensp);
         Sanpham::where('id','=',$id)->delete();
           return Redirect::to('sanpham/xem-sanpham')->with('successdel', "Xóa sản phẩm  thành công");
         }else{
             return Redirect::to('sanpham/xem-sanpham')->with('errordel', "Thất bại. Sản phẩm đang được định giá hoặc tồn tại trong hóa đơn");
         }
     }
     
     public function getSuaSanpham($id){
         $sanpham=  Sanpham::find($id);
                $loais=  Loai::get();
         if(is_null($sanpham)){
             return Redirect::to('sanpham/xem-sanpham');
         }else{
             return View::make('sanpham.edit')->with('sp', $sanpham)
                                              ->with('loais', $loais);
         }
         
     }
     
       public function postSuaSanpham($id){
                $input=Input::all();
            $validation=  Validator::make($input, Sanpham::$rulesUpdate);
            
             if($validation->passes()){
                 
         $image=Input::file('hinhanh');
         if(!is_null($image)){// nếu có thay doi hinh anh
         $imageName=$image->getClientOriginalName();
         $nameArray=explode('.', $imageName);
         $imageType= end($nameArray);
         $imageRules=array("jpg","jpeg","png");
         if(in_array($imageType, $imageRules)){ //neu dung thi tien hanh insert vao csdl
             $imageNewName=  uniqid(rand(), true);
             $imageNewName=md5($imageNewName);
             $imageNewName=  substr($imageNewName, 0, 6);
             $imageNewName.=".".$imageType;
             Input::file('hinhanh')->move('uploads', $imageNewName); // upload hinh anh
          
             //sau khi upload thi insert vao csdl
             $sp= Sanpham::find($id);
             $sp->tensp=  Input::get('tensp');
             $sp->donvitinh=Input::get('donvitinh');
             $sp->hinhanh=$imageNewName;
             $sp->chitietsp=Input::get('chitietsp');
             $sp->khuyenmai=Input::get('khuyenmai');
             $sp->id_loai=Input::get('id_loai');
                //luu logfile
             $info=  Sanpham::where('id','=',$id)->get()->toArray();
              Logfileadmin::addData("Sửa", "Sản Phẩm", $sp->id, $sp->tensp,$info);
              //hoan tat update
             $sp->save();
             
             return Redirect::to("sanpham/chitiet-sanpham/{$sp->id}");
             
         }else{
             return Redirect::to("sanpham/sua-sanpham/{$id}")
                     ->with('errorImage', "Không đúng định dạng hình ảnh");
         }
         }else{
             //nếu không thay doi hinh anh
              $sp= Sanpham::find($id);
             $sp->tensp=  Input::get('tensp');
             $sp->donvitinh=Input::get('donvitinh');
         
             $sp->chitietsp=Input::get('chitietsp');
             $sp->khuyenmai=Input::get('khuyenmai');
             $sp->id_loai=Input::get('id_loai');
                      //luu logfile
              $info=  Sanpham::where('id','=',$id)->get()->toArray();
              Logfileadmin::addData("Sửa", "Sản Phẩm", $sp->id, $sp->tensp,$info);
              //hoan tat update
             $sp->save();
              return Redirect::to("sanpham/chitiet-sanpham/{$sp->id}");
             
         }
      }else{
      
      return Redirect::to("sanpham/sua-sanpham/{$id}")
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
      }
       }
       
       
     public function getChitietSanpham($id){
         $sp=  Sanpham::find($id);
         if(is_null($sp)){  return Redirect::to('sanpham/xem-sanpham'); }else
         return View::make('sanpham.show')->with('v', $sp);
     }
}
?>
