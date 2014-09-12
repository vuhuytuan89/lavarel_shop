@extends('admin.newmain')

@section('title')
Sản Phẩm
@stop

@section('content')
<h1>Sản Phẩm <small>Tất cả sản phẩm</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('admin')}}"><i class="icon-dashboard"></i>Trang chủ</a></li>
              <li class="active"><i class="icon-file-alt"></i>Tất cả sản phẩm</li>
            </ol>
 <p>   <a href="{{asset('sanpham/them-sanpham')}}">Thêm sản phẩm mới</a></p>
 @if(Session::has('success'))
 <div class='alert alert-info'>
     {{{Session::get('success')}}}
     <a href="{{asset('nhap/them-hoadon')}}">Xem hóa đơn</a>
     {{Session::forget('success')}}
 </div>
 @endif
 
 
  @if(Session::has('errordel'))
 <div class='alert alert-danger'>
     {{{Session::get('errordel')}}}
  
     {{Session::forget('errordel')}}
 </div>
 @endif
 
   @if(Session::has('successdel'))
 <div class='alert alert-info'>
     {{{Session::get('successdel')}}}
  
     {{Session::forget('successdel')}}
 </div>
 @endif
    @if($sp->count()>0)
            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                    <tr>
                        <th>ID <i class='fa fa-sort'></i></th>
                        <th>Tên sản phẩm <i class='fa fa-sort'></i></th>
                        <th>Đơn vị tính</th>
                        <th>Hình ảnh</th>
                        <th>Chi tiết</th>
                        <th>Khuyến mãi</th>
                        <th>Lượt xem <i class='fa fa-sort'></i></th>
                        <th>ID Loại <i class='fa fa-sort'></i></th>
                    </tr>
                    
                    
                </thead>
                
                <tbody>
                    @foreach($sp as $v)
                    <tr>
                        <td>{{{$v->id}}}</td>
                        <td><a href="<?php echo asset("sanpham/chitiet-sanpham/{$v->id}"); ?>">{{$v->tensp}}</a></td>
                        <td>{{$v->donvitinh}}</td>
                        <td><img src="<?php echo asset("uploads/{$v->hinhanh}") ?>" width='94' height='150' /></td>
                        <td>{{$v->chitietsp}}</td>
                        <td><?php if($v->khuyenmai==0) echo "Không"; else echo "Có"; ?></td>
                        <td>{{$v->luotxem}}</td>
                        <td><a href="<?php echo asset("loais/{$v->id_loai}") ?>">{{$v->id_loai}}</a></td>
                        <td><a href="<?php echo asset("sanpham/sua-sanpham/{$v->id}") ?>" class="btn btn-info">Edit</a></td>
                        <td><a href="<?php echo asset("sanpham/xoa-sanpham/{$v->id}") ?>" class="btn btn-danger">Delete</a></td>
                        <td><a href="<?php echo asset("nhap/them-sanpham/{$v->id}"); ?>">Nhập hàng</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    {{$sp->links()}}
    @else
    Chưa có thông tin
    @endif
    
    
    

@stop