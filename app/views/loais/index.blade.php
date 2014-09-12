@extends('admin.newmain')
@section('title')
Loại sản phẩm
@stop

@section('content')
<h1>Loại Sản Phẩm <small>Tất cả loại sản phẩm</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('admin')}}"><i class="icon-dashboard"></i> Trang Chủ</a></li>
              <li class="active"><i class="icon-file-alt"></i>Tất cả loại sản phẩm</li>
            </ol>

<p>{{ link_to_route('loais.create', 'Thêm mới ') }}</p>

@if(Session::has('errorDelete'))
<div class='alert alert-danger alert-dismissable' >
    {{Session::get('errorDelete')}}
    {{Session::forget('errorDelete')}}
</div>    
@endif
@if ($loais->count())
       
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Tên loại</th>
				<th>ID Chủng loại</th>
				<th>Id Hãng</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($loais as $loai)
				<tr>
					<td>{{{ $loai->tenloai }}}</td>
                                        <td><a href="<?php echo asset("chung_loais/{$loai->id_chungloai}") ?>" >{{{ $loai->id_chungloai }}} </a></td>
                                        <td><a href="<?php echo asset("hangs/{$loai->id_hang}") ?> ">{{{ $loai->id_hang }}}</a></td>
                    <td>{{ link_to_route('loais.edit', 'Edit', array($loai->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('loais.destroy', $loai->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
 {{$loais->links()}}
@else
	Chưa có thông tin
@endif

@stop
