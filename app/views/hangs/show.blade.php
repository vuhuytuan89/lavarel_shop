@extends('admin.newmain')

@section('title')
Thông tin cập nhật
@stop

@section('content')
 <h1>Hãng Cung Cấp <small>Chi tiết hãng cung cấp</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('hangs')}}"><i class="icon-dashboard"></i> Tất cả hãng cung cấp</a></li>
              <li class="active"><i class="icon-file-alt"></i>Chi tiết hãng cung cấp</li>
            </ol>

<table class="table table-striped table-bordered">
	<thead>
            <tr>                <th>ID</th>
                                <th>Tên hãng</th>
				<th>Địa chỉ</th>
				<th>Điện thoại</th>
				<th>Email</th>
		</tr>
	</thead>

	<tbody>
            <tr>                        <td>{{{ $hang->id }}}</td>
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
	</tbody>
</table>

@stop
