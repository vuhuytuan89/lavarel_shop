@extends('admin.newmain')

@section('title')
Chi Tiết Đơn Đặt Hàng
@stop

@section('content')
 <h1>Đơn đặt hàng <small>Chi tiết </small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('dat_hang/xemdon-dathang')}}"><i class="icon-dashboard"></i> Đơn đặt hàng</a></li>
              <li class="active"><i class="icon-file-alt"></i>Chi tiết đơn đặt hàng</li>
            </ol>




	<table class="table table-bordered table-hover tablesorter">
		<thead>
			<tr>    
                                 <th>ID Hóa Đơn</th>
				<th>ID Sản Phẩm </th>
                                <th>Tên Sản Phẩm</th>
                                <th>Hình Ảnh </th>
                                <th>Số Lượng</th>
                                <th>Giá </th>
                             
			</tr>
		</thead>

		<tbody>
			@foreach($sps as $sp)
                        <tr>
                            <td>{{{$sp->id_dh}}}</td>
                            <td>{{{$sp->id_sp}}}</td>
                            <td>{{{$sp->tensp}}}</td>
                            <td><img src="<?php echo asset("uploads/{$sp->hinhanh}"); ?>" style="width:160px; height: 165px;" /></td>
                            <td>{{{$sp->soluong}}}</td>
                             <td>{{{number_format($sp->gia)}}}</td>
                        </tr>
                        @endforeach
                       
                        <tr>
                            <th colspan="3">
                                Hình thức vận chuyển
                            </th>
                            <td colspan="3"><p>{{{$info->hinhthuc}}}</p><p>Giá: {{number_format($info->gia)}}</p></td>
                        </tr>
                        
                          <tr>
                             <th colspan="3" >Tổng giá</th>
                            <td  colspan="3">{{number_format($info->tonggia)}}</td>
                        </tr>
                        
                        <tr>
                            <th colspan="3">Tài Khoản</th>
                            <td colspan="3">{{{$info->taikhoan}}}</td>
                        </tr>
                         <tr>
                            <th colspan="3">Họ Tên</th>
                            <td colspan="3">{{{$info->tennd}}}</td>
                        </tr>
                        
                         <tr>
                            <th colspan="3">Email</th>
                            <td colspan="3">{{{$info->email}}}</td>
                        </tr>
                         <tr>
                            <th colspan="3">Điện Thoại</th>
                            <td colspan="3">{{{$info->dienthoai}}}</td>
                        </tr>
                         <tr>
                            <th colspan="3">Nơi Giao Hàng</th>
                            <td colspan="3">{{{$info->noigiaohang}}}</td>
                        </tr>
                         <tr>
                            <th colspan="3">Ghi chú</th>
                            <td colspan="3">{{{$info->ghichu}}}</td>
                        </tr>
                         <tr>
                             @if($info->id_trangthai==4)
                            <th colspan="6"> <a class="btn btn-small btn-primary" href="<?php echo asset("dat_hang/chuyen-hang/{$info->id}"); ?>">Chuyển Hàng</a></th>
                            @else
                              <th colspan="6"> <a class="btn btn-small btn-primary" href="">Đã Chuyển Hàng</a></th>
                            @endif
                        </tr>
		</tbody>
	</table>

                       


@stop
