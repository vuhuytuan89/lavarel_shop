@extends('admin.newmain')
@section('title')
Giá sản phẩm
@stop

@section('content')
<h1>Danh Sách Giá <small>Tất cả giá</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('admin')}}"><i class="icon-dashboard"></i> Trang Chủ</a></li>
              <li class="active"><i class="icon-file-alt"></i>Danh sách giá</li>
            </ol>

<p><a href="{{asset('gia/them-gia')}}">Thêm giá mới</a></p>

@if(Session::has('success'))
<div class='alert alert-success alert-dismissable' >
    {{Session::get('success')}}
    {{Session::forget('success')}}
</div>    
@endif
@if ($gias->count())
       
             
	<table class="table table-bordered table-hover table-striped tablesorter">
		<thead>
                    <tr>        <th>ID Giá<i class='fa fa-sort'></i></th>
                        <th><a href='{{asset("gia/xem-gia")}}'>Tên sản phẩm </a><i class='fa fa-sort'></i></th>
                                <th><a href='{{asset("gia/xem-gia/ngay")}}'>Ngày Tạo </a><i class='fa fa-sort'></i></th>
				<th>Giá<i class='fa fa-sort'></i></th>
                                <th>Áp Dụng</th>
			</tr>
		</thead>

		<tbody>
                    @foreach($gias as $gia)
                    <tr>
                        <td>{{$gia->id}}</td>
                        <td><a href="<?php echo asset("gia/chitiet-gia/{$gia->id_sanpham}") ?>">{{$gia->tensp}}</a></td>
                        <td><?php
                            $date=new DateTime($gia->ngay);
                        echo date_format($date,'d-m-Y');
                                ?></td>
                        <td><?php echo number_format($gia->gia); ?></td>
                        <td>
                            <?php
                               $url=asset("gia/ap-dung/{$gia->id}/{$gia->id_sanpham}/{$gia->apdung}");
                               $apdung=asset("assets/images/check.png");
                               $khongapdung=asset("assets/images/uncheck.png");
                                if($gia->apdung==0){
                                   
                                    echo "<a href='{$url}'  ><img src='{$khongapdung}' /></a>";
                                }else{
                                     echo "<a href='{$url}'  ><img src='{$apdung}' /></a>";
                                }
                            ?>
                        </td>
           
                        <td><a href="<?php echo asset("gia/xoa-gia/{$gia->id}/{$gia->id_sanpham}")  ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
		</tbody>
	</table>
        <?php echo $gias->links(); ?>
 
@else
	Chưa có thông tin
@endif

@stop
