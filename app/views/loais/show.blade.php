@extends('admin.newmain')

@section('title')
Thông tin loại sản phẩm
@stop

@section('content')
<h1>Loại Sản Phẩm <small>Chi tiết loại sản phẩm</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('loais')}}"><i class="icon-dashboard"></i> Loại Sản Phẩm </a></li>
              <li class="active"><i class="icon-file-alt"></i>Chi tiết loại sản phẩm</li>
            </ol>

<p>{{ link_to_route('loais.index', 'Xem tất cả') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Tên loại</th>
				<th>ID Chủng loại</th>
				<th>ID Hãng</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
