@extends('admin.newmain')
@section('title')
Giá sản phẩm
@stop

@section('content')
<h1>Bảng Giá Đang Áp Dụng <small>Tất cả giá đang áp dụng</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('admin')}}"><i class="icon-dashboard"></i> Trang Chủ</a></li>
              <li class="active"><i class="icon-file-alt"></i>Bảng Giá Đang Áp Dụng</li>
            </ol>



@if ($gias->count())
       
             
	<table class="table table-bordered table-hover table-striped tablesorter">
		<thead>
                    <tr>        
                        <th>ID Giá<i class='fa fa-sort'></i></th>
                        <th>Tên sản phẩm <i class='fa fa-sort'></i></th>
                        <th>Hình ảnh</th>   
                        <th>Chi tiết sản phẩm</th>
			<th>Giá<i class='fa fa-sort'></i></th>
                        <th>Khuyến Mãi</th>   
                        <th>ID Loại Sản Phẩm <i class='fa fa-sort'></i></th>
			</tr>
		</thead>

		<tbody>
                      @foreach($gias as $v)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td><a href="<?php echo asset("sanpham/chitiet-sanpham/{$v->id}"); ?>">{{$v->tensp}}</a></td>
            
                        <td><img src="<?php echo asset("uploads/{$v->hinhanh}") ?>" width='94' height='150' /></td>
                        <td>{{$v->chitietsp}}</td>
                        <td>{{$v->gia}}</td>
                        <td><?php if($v->khuyenmai==0) echo "Không"; else echo "Có"; ?></td>
               
                        <td><a href="<?php echo asset("loais/{$v->id_loai}") ?>">{{$v->id_loai}}</a></td>

                    </tr>
                    @endforeach
		</tbody>
	</table>
        {{$gias->links()}}
 
@else
	Chưa có thông tin
@endif

@stop
