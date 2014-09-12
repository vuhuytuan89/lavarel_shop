@extends('admin.newmain')

@section('title')
Đơn Đặt Hàng Đã Chuyển
@stop

@section('content')
 <h1>Đơn hàng đã chuyển <small>Tất cả </small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('dat_hang/xemdon-dathang')}}"><i class="icon-dashboard"></i> Đơn Đặt Hàng</a></li>
              <li class="active"><i class="icon-file-alt"></i>Đơn hàng đã chuyển</li>
            </ol>



@if ($count>0)
	<table class="table table-bordered table-hover tablesorter">
		<thead>
			<tr>    
                            <th>ID Hóa Đơn<i class="fa fa-sort"></i></th>
				<th>ID Tài khoản <i class="fa fa-sort"></i></th>
                                <th>Tên Tài Khoản<i class="fa fa-sort"></i></th>
                                <th>Ngày Đặt <i class="fa fa-sort"></i></th>
                                <th>Ngày Giao <i class="fa fa-sort"></i></th>
                                <th>Hình Thức</th>
                                <th>Tổng Giá <i class="fa fa-sort"></i></th>
                             
			</tr>
		</thead>

		<tbody>
			@foreach($donhangs as $donhang)
                        <tr>
                            <td>{{{$donhang->id}}}</td>
                            <td>{{{$donhang->id_user}}}</td>
                            <td>{{{$donhang->taikhoan}}}</td>
                            <td>{{{$donhang->ngaymua}}}</td>
                            <td>{{{$donhang->ngaygiao}}}</td>
                            <td>{{{$donhang->hinhthuc}}}</td>
                            <td>{{{number_format($donhang->tonggia)}}}</td>
                            <td><a href="<?php echo asset("dat_hang/chitiet-donhang/{$donhang->id}"); ?>" > Xem chi tiết</a></td>
                
                            <td><a class="btn btn-small btn-primary" href="">Đã Chuyển Hàng</a></td>
                        </tr>
                        @endforeach
		</tbody>
	</table>
@else
	Chưa có đơn đặt hàng
@endif

@stop
