@extends('admin.newmain')

@section('title')
Đơn Đặt Hàng
@stop

@section('content')
 <h1>Đơn đặt hàng <small>Tất cả </small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('admin')}}"><i class="icon-dashboard"></i> Trang Chủ</a></li>
              <li class="active"><i class="icon-file-alt"></i>Đơn đặt hàng</li>
            </ol>


 <p><a href="{{asset('dat_hang/donhang-dachuyen')}}">Xem đơn hàng đã chuyển</a></p>
 @if(Session::has('error'))
 <div class='alert alert-warning'>
     <ul>
     @foreach(Session::get('error') as $error)
     <li>{{{$error}}}</li>
     @endforeach
     </ul>
 </div>
 @endif
@if ($count>0)
	<table class="table table-bordered table-hover tablesorter">
		<thead>
			<tr>    
                            <th>ID Hóa Đơn<i class="fa fa-sort"></i></th>
				<th>ID Tài khoản <i class="fa fa-sort"></i></th>
                                <th>Tên Tài Khoản<i class="fa fa-sort"></i></th>
                                <th>Ngày Đặt <i class="fa fa-sort"></i></th>
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
                            <td>{{{$donhang->hinhthuc}}}</td>
                            <td>{{{number_format($donhang->tonggia)}}}</td>
                            <td><a href="<?php echo asset("dat_hang/chitiet-donhang/{$donhang->id}"); ?>" > Xem chi tiết</a></td>
                            <td><?php if($donhang->xem==0) echo "Chưa xem"; else echo "Đã xem"; ?></td>
                            <td><a class="btn btn-small btn-primary" href="<?php echo asset("dat_hang/chuyen-hang/{$donhang->id}") ?>">Chuyển Hàng</a></td>
                        </tr>
                        @endforeach
		</tbody>
	</table>
@else
	Chưa có đơn đặt hàng
@endif

@stop
