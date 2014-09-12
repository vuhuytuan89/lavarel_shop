@extends('admin.newmain')
@section('title')
Tồn Kho
@stop

@section('content')
<h1>Tồn Kho <small>Tất cả sản phẩm</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('admin')}}"><i class="icon-dashboard"></i> Trang Chủ</a></li>
              <li class="active"><i class="icon-file-alt"></i>Tồn Kho</li>
            </ol>



    

@if ($khohangs->count())
       
             
	<table class="table table-bordered table-hover table-striped tablesorter">
		<thead>
                    <tr>       
                        <th>ID Sản Phẩm <i class='fa fa-sort'></i></th>
                        <th>Tên Sản Phẩm <i class='fa fa-sort'></i></th>
                        <th>Số Lượng Tồn <i class='fa fa-sort'></i></th>
                        <th>Tổng kho</th>
                        
                    </tr>
		</thead>

		<tbody>
                   @foreach($khohangs as $v)
                   <tr>
                       <td>{{{$v->id}}}</td>
                       <td><a href="<?php echo asset("sanpham/chitiet-sanpham/{$v->id}") ?>">{{{$v->tensp}}}</a></td>
                         <td>{{{$v->soluong}}}</td>
                         <td>{{{$v->tongso}}}</td>
                          
                   </tr>
                   @endforeach
		</tbody>
	</table>
        <?php echo $khohangs->links(); ?>
 
@else
	Chưa có thông tin
@endif

@stop
