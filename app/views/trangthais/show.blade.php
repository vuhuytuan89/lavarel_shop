@extends('admin.newmain')

@section('title')
Thông tin trạng thái
@stop

@section('content')

<h1>Trạng Thái Đơn Hàng<small>Chi tiết</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('trangthais')}}"><i class="icon-dashboard"></i> Trạng Thái Đơn Hàng</a></li>
              <li class="active"><i class="icon-file-alt"></i>Chi tiết </li>
            </ol>

<p>{{ link_to_route('trangthais.index', 'Xem tất cả') }}</p>

<table class="table table-striped table-bordered">
	<thead>
            <tr>    <th>id</th>
			<th>Trangthai</th>
		</tr>
	</thead>

	<tbody>
		<tr>    <td>{{{ $trangthai->id }}}</td>
			<td>{{{ $trangthai->trangthai }}}</td>
                    <td>{{ link_to_route('trangthais.edit', 'Edit', array($trangthai->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('trangthais.destroy', $trangthai->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
