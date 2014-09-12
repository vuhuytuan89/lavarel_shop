@extends('admin.newmain')

@section('title')
Thêm trạng thái mới
@stop

@section('content')

<h1>Trạng Thái Đơn Hàng<small> Tất cả trạng thái</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('admin')}}"><i class="icon-dashboard"></i> Trang Chủ</a></li>
              <li class="active"><i class="icon-file-alt"></i>Trạng thái đơn hàng</li>
            </ol>

<p>{{ link_to_route('trangthais.create', 'Thêm trạng thái') }}</p>

@if ($trangthais->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
                                <th>ID</th>
				<th>Trạng Thái</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($trangthais as $trangthai)
				<tr>
                                        <td>{{{ $trangthai->id }}}</td>
					<td>{{{ $trangthai->trangthai }}}</td>
                    <td>{{ link_to_route('trangthais.edit', 'Edit', array($trangthai->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('trangthais.destroy', $trangthai->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Chưa có thông tin
@endif

@stop
