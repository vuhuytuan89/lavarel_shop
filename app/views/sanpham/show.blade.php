@extends('admin.newmain')

@section('title')
Chi tiết Sản Phẩm
@stop

@section('content')
<h1>Sản Phẩm <small>Chi tiết sản phẩm</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('sanpham/xem-sanpham')}}"><i class="icon-dashboard"></i>Sản Phẩm</a></li>
              <li class="active"><i class="icon-file-alt"></i>Chi tiết sản phẩm</li>
            </ol>
 <p>   <a href="{{asset('sanpham/xem-sanpham')}}">Tất cả sản phẩm</a></p>
    
          

      <table class="table table-striped table-bordered">
          <tr>
              <th>ID</th>
                <td>{{{$v->id}}}</td>
          </tr>
          <tr>
              <th>Tên sản phẩm</th>
              <td>{{$v->tensp}}</td>
          </tr>
          
           <tr>
              <th>Đơn vị tính</th>
              <td>{{$v->donvitinh}}</td>
          </tr>
          
           <tr>
              <th>Hình ảnh</th>
               <td><img src="<?php echo asset("uploads/{$v->hinhanh}") ?>" width='200' height='280' /></td>
          </tr>
          
           <tr>
              <th>Chi tiết</th>
              <td>{{$v->chitietsp}}</td>
          </tr>
          
           <tr>
              <th>Khuyến mãi</th>
              <td><?php if($v->khuyenmai==0) echo "Không"; else echo "Có"; ?></td>
          </tr>
          
           <tr>
              <th>Lượt xem</th>
              <td>{{$v->luotxem}}</td>
          </tr>
          
          <tr>
              <td colspan="2">
                  <a href="<?php echo asset("sanpham/sua-sanpham/{$v->id}") ?>" class="btn btn-info">Edit</a>
                    <a href="<?php echo asset("sanpham/xoa-sanpham/{$v->id}") ?>" class="btn btn-danger">Delete</a>
              </td>
            
          </tr>
    
      </table>
@stop