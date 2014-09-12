@extends('admin.main')

@section('title')
Cập Nhật Sản Phẩm
@stop

@section('content')
     <h2>Cập nhật sản phẩm</h2>
     
     <form class='well '>
         <div><label>Tên sản phẩm</label><input type='text' placeholder="Tên sản phẩm" class='form-control'/></div></br>
         <div><label>Mô tả</label><input type='text' placeholder="Mô tả sản phẩm" class='form-control'/></div></br>
         <div>  <label>Hãng</label>
            <select class='form-control select'>
                <option>Nokia</option>
                <option>SamSung</option>
            </select>
         </div>
             </br>
            
             <div><input class='btn btn-primary btn-lg ' value='Cập Nhật' />
                 <a class='btn btn-danger btn-lg'>Thoát</a>
             </div>
     </form>
       
@stop