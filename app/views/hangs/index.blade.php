@extends('admin.newmain')
@section('title')
Cập nhật hãng
@stop

@section('content')
   <h1>Hãng Cung Cấp <small>Tất cả hãng cung cấp</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('admin')}}"><i class="icon-dashboard"></i> Trang Chủ</a></li>
              <li class="active"><i class="icon-file-alt"></i> Hãng Cung Cấp</li>
            </ol>


<p>{{ link_to_route('hangs.create', 'Thêm hãng mới') }}</p>

@if ($hangs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>    
                                <th>ID</th>
				<th>Tên hãng</th>
				<th>Địa chỉ</th>
				<th>Điện thoại</th>
				<th>Email</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($hangs as $hang)
                        <tr>            <td>{{{ $hang->id }}}</td>
					<td>{{{ $hang->tenhang }}}</td>
					<td>{{{ $hang->diachi }}}</td>
					<td>{{{ $hang->dienthoai }}}</td>
					<td>{{{ $hang->email }}}</td>
                    <td>{{ link_to_route('hangs.edit', 'Edit', array($hang->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('hangs.destroy', $hang->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Chưa có thông tin.
@endif

@stop
